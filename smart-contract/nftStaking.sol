// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC1155/IERC1155Receiver.sol";

import "@openzeppelin/contracts/token/ERC1155/IERC1155.sol";

import "@openzeppelin/contracts/token/ERC20/IERC20.sol";

import "@openzeppelin/contracts/access/Ownable.sol";

contract ERC1155Staking is Ownable {

    // Struct to represent a staking plan
    struct StakingPlan {
        uint256 apy; // Annual Percentage Yield
        uint256 lockingPeriod; // Locking period in seconds
        address rewardToken; // Address of the reward token
    }

    // Struct to represent a user stake
    struct UserStake {
        uint256 amount; // Staked amount
        uint256 timestamp; // Timestamp of the stake
    }
    
    uint256 public totalStakingPlans;
    IERC1155 public stakingToken;

    // Mapping to store staking plans
    mapping(uint256 => StakingPlan) public stakingPlans;

    // Mapping to store user stakes
    mapping(address => mapping(uint256 => mapping(uint256 => UserStake))) public userStakes;

    // Mapping to store the total number of tokenIds for each user and plan
    mapping(address => mapping(uint256 => uint256)) public userStakeCount;

    // Events
    event Staked(address indexed user, uint256 indexed planId, uint256 indexed tokenId, uint256 amount);
    event Unstaked(address indexed user, uint256 indexed planId, uint256 indexed tokenId, uint256 amount);
    event RewardsClaimed(address indexed user, uint256 indexed planId, uint256 indexed tokenId, uint256 amount);

    constructor(address _stakingToken) Ownable(msg.sender) {
        stakingToken = IERC1155(_stakingToken);
    }

    // Function to create a new staking plan
    function createStakingPlan(uint256 planId, uint256 apy, uint256 lockingPeriod, address rewardToken) external onlyOwner {
        stakingPlans[planId] = StakingPlan(apy, lockingPeriod, rewardToken);
        totalStakingPlans++;
    }

    // Function to stake ERC1155 tokens
    function stake(uint256 planId, uint256 tokenId, uint256 amount) external {
        StakingPlan storage plan = stakingPlans[planId];
        require(plan.lockingPeriod > 0, "Invalid plan");

        // Transfer tokens from user to contract
        IERC1155(stakingToken).safeTransferFrom(msg.sender, address(this), tokenId, amount, "");

        // Store stake information
        userStakes[msg.sender][planId][tokenId] = UserStake(amount, block.timestamp);
        
        // Update the total number of tokenIds for the user and plan
        userStakeCount[msg.sender][planId]++;
        
        emit Staked(msg.sender, planId, tokenId, amount);
    }

    // Function to unstake ERC1155 tokens
    function unstake(uint256 planId, uint256 tokenId) external {
        UserStake storage userStake = userStakes[msg.sender][planId][tokenId];
        require(userStake.amount > 0, "No stake found");

        // Transfer tokens back to user
        IERC1155(stakingToken).safeTransferFrom(address(this), msg.sender, tokenId, userStake.amount, "");

        // Clear user's stake
        delete userStakes[msg.sender][planId][tokenId];

        emit Unstaked(msg.sender, planId, tokenId, userStake.amount);
    }

    // Function to claim rewards
    function claimRewards(uint256 planId, uint256 tokenId) external {
        StakingPlan storage plan = stakingPlans[planId];
        UserStake storage userStake = userStakes[msg.sender][planId][tokenId];
        require(userStake.amount > 0, "No stake found");
        require(block.timestamp >= userStake.timestamp + plan.lockingPeriod, "Rewards not available yet");
      
        // Calculate rewards based on staked amount and APY
        uint256 rewardsAmount = (userStake.amount * plan.apy * plan.lockingPeriod) / (100 * 365 * 24 * 60 * 60);

        // Transfer rewards to user
        IERC20(plan.rewardToken).transfer(msg.sender, rewardsAmount);

        // burn nfts 
        IERC1155(stakingToken).safeTransferFrom(address(this), 0x000000000000000000000000000000000000dEaD, tokenId, userStake.amount, "");

        // Clear user's stake
        delete userStakes[msg.sender][planId][tokenId];

        emit RewardsClaimed(msg.sender, planId, tokenId, rewardsAmount);
    }

    // Function to calculate rewards for a user's different plans
     function calculateRewardsForUser(address user) external view returns (uint256[] memory) {
        uint256[] memory rewards;

        // Initialize rewards array with the length of staking plans
        rewards = new uint256[](totalStakingPlans);

        // Loop through all staking plans
        for (uint256 planId = 1; planId <= totalStakingPlans; planId++) {
            // Initialize rewards for the plan
            uint256 planRewards = 0;

            // Loop through all user stakes for the plan
            for (uint256 tokenId = 1; tokenId <= userStakeCount[user][planId]; tokenId++) {
                UserStake storage userStake = userStakes[user][planId][tokenId];
                StakingPlan storage plan = stakingPlans[planId];

                // Check if user has a stake for this plan and token
                if (userStake.amount > 0) {
                    // Calculate rewards for the stake based on APY and locking period
                    uint256 stakeRewards = (userStake.amount * plan.apy * plan.lockingPeriod) / (100 * 365 * 24 * 60 * 60);
                    
                    // Add rewards to the plan rewards
                    planRewards += stakeRewards;
                }
            }

            // Set rewards for the plan in the rewards array
            rewards[planId - 1] = planRewards;
        }

        return rewards;
    }
    function onERC1155Received(address, address, uint256, uint256, bytes memory) public virtual returns (bytes4) {
        return this.onERC1155Received.selector;
    }

    function onERC1155BatchReceived(address, address, uint256[] memory, uint256[] memory, bytes memory) public virtual returns (bytes4) {
        return this.onERC1155BatchReceived.selector;
    }

    function onERC721Received(address, address, uint256, bytes memory) public virtual returns (bytes4) {
        return this.onERC721Received.selector;
    }
}
