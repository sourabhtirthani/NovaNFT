// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

/**
 * @dev Interface of the ERC165 standard, as defined in the
 * https://eips.ethereum.org/EIPS/eip-165[EIP].
 *
 * Implementers can declare support of contract interfaces, which can then be
 * queried by others ({ERC165Checker}).
 *
 * For an implementation, see {ERC165}.
 */
interface IERC165 {
    /**
     * @dev Returns true if this contract implements the interface defined by
     * `interfaceId`. See the corresponding
     * https://eips.ethereum.org/EIPS/eip-165#how-interfaces-are-identified[EIP section]
     * to learn more about how these ids are created.
     *
     * This function call must use less than 30 000 gas.
     */
    function supportsInterface(bytes4 interfaceId) external view returns (bool);
}


/**
 * @dev Interface that must be implemented by smart contracts in order to receive
 * ERC-1155 token transfers.
 */
interface IERC1155Receiver is IERC165 {
    /**
     * @dev Handles the receipt of a single ERC1155 token type. This function is
     * called at the end of a `safeTransferFrom` after the balance has been updated.
     *
     * NOTE: To accept the transfer, this must return
     * `bytes4(keccak256("onERC1155Received(address,address,uint256,uint256,bytes)"))`
     * (i.e. 0xf23a6e61, or its own function selector).
     *
     * @param operator The address which initiated the transfer (i.e. msg.sender)
     * @param from The address which previously owned the token
     * @param id The ID of the token being transferred
     * @param value The amount of tokens being transferred
     * @param data Additional data with no specified format
     * @return `bytes4(keccak256("onERC1155Received(address,address,uint256,uint256,bytes)"))` if transfer is allowed
     */
    function onERC1155Received(
        address operator,
        address from,
        uint256 id,
        uint256 value,
        bytes calldata data
    ) external returns (bytes4);

    /**
     * @dev Handles the receipt of a multiple ERC1155 token types. This function
     * is called at the end of a `safeBatchTransferFrom` after the balances have
     * been updated.
     *
     * NOTE: To accept the transfer(s), this must return
     * `bytes4(keccak256("onERC1155BatchReceived(address,address,uint256[],uint256[],bytes)"))`
     * (i.e. 0xbc197c81, or its own function selector).
     *
     * @param operator The address which initiated the batch transfer (i.e. msg.sender)
     * @param from The address which previously owned the token
     * @param ids An array containing ids of each token being transferred (order and length must match values array)
     * @param values An array containing amounts of each token being transferred (order and length must match ids array)
     * @param data Additional data with no specified format
     * @return `bytes4(keccak256("onERC1155BatchReceived(address,address,uint256[],uint256[],bytes)"))` if transfer is allowed
     */
    function onERC1155BatchReceived(
        address operator,
        address from,
        uint256[] calldata ids,
        uint256[] calldata values,
        bytes calldata data
    ) external returns (bytes4);
}
/**
 * @dev Required interface of an ERC-1155 compliant contract, as defined in the
 * https://eips.ethereum.org/EIPS/eip-1155[ERC].
 */
interface IERC1155 is IERC165 {
   
    /**
     * @dev Transfers a `value` amount of tokens of type `id` from `from` to `to`.
     *
     * WARNING: This function can potentially allow a reentrancy attack when transferring tokens
     * to an untrusted contract, when invoking {onERC1155Received} on the receiver.
     * Ensure to follow the checks-effects-interactions pattern and consider employing
     * reentrancy guards when interacting with untrusted contracts.
     *
     * Emits a {TransferSingle} event.
     *
     * Requirements:
     *
     * - `to` cannot be the zero address.
     * - If the caller is not `from`, it must have been approved to spend ``from``'s tokens via {setApprovalForAll}.
     * - `from` must have a balance of tokens of type `id` of at least `value` amount.
     * - If `to` refers to a smart contract, it must implement {IERC1155Receiver-onERC1155Received} and return the
     * acceptance magic value.
     */
    function safeTransferFrom(address from, address to, uint256 id, uint256 value, bytes calldata data) external;
}


interface IERC20 {
    /**
   * @dev Moves `amount` tokens from the caller's account to `recipient`.
   *
   * Returns a boolean value indicating whether the operation succeeded.
   *
   * Emits a {Transfer} event.
   */
  function transfer(address recipient, uint256 amount) external returns (bool);

  /**
   * @dev Moves `amount` tokens from `sender` to `recipient` using the
   * allowance mechanism. `amount` is then deducted from the caller's
   * allowance.
   *
   * Returns a boolean value indicating whether the operation succeeded.
   *
   * Emits a {Transfer} event.
   */
  function transferFrom(address sender, address recipient, uint256 amount) external returns (bool);
}

 /*
 * @dev Provides information about the current execution context, including the
 * sender of the transaction and its data. While these are generally available
 * via msg.sender and msg.data, they should not be accessed in such a direct
 * manner, since when dealing with GSN meta-transactions the account sending and
 * paying for execution may not be the actual sender (as far as an application
 * is concerned).
 *
 * This contract is only required for intermediate, library-like contracts.
 */

contract Context {
  // Empty internal constructor, to prevent people from mistakenly deploying
  // an instance of this contract, which should be used via inheritance.
  constructor ()  { }

  function _msgSender() internal view returns (address payable) {
    return payable(msg.sender);
  }

  function _msgData() internal view returns (bytes memory) {
    this; // silence state mutability warning without generating bytecode - see https://github.com/ethereum/solidity/issues/2691
    return msg.data;
  }
}

/**
 * @dev Contract module which provides a basic access control mechanism, where
 * there is an account (an owner) that can be granted exclusive access to
 * specific functions.
 *
 * By default, the owner account will be the one that deploys the contract. This
 * can later be changed with {transferOwnership}.
 *
 * This module is used through inheritance. It will make available the modifier
 * `onlyOwner`, which can be applied to your functions to restrict their use to
 * the owner.
 */
contract Ownable is Context {
  address private _owner;

  event OwnershipTransferred(address indexed previousOwner, address indexed newOwner);

  /**
   * @dev Initializes the contract setting the deployer as the initial owner.
   */
  constructor ()  {
    address msgSender = _msgSender();
    _owner = msgSender;
    emit OwnershipTransferred(address(0), msgSender);
  }

  /**
   * @dev Returns the address of the current owner.
   */
  function owner() public view returns (address) {
    return _owner;
  }

  /**
   * @dev Throws if called by any account other than the owner.
   */
  modifier onlyOwner() {
    require(_owner == _msgSender(), "Ownable: caller is not the owner");
    _;
  }

  /**
   * @dev Leaves the contract without owner. It will not be possible to call
   * `onlyOwner` functions anymore. Can only be called by the current owner.
   *
   * NOTE: Renouncing ownership will leave the contract without an owner,
   * thereby removing any functionality that is only available to the owner.
   */
  function renounceOwnership() public onlyOwner {
    emit OwnershipTransferred(_owner, address(0));
    _owner = address(0);
  }

  /**
   * @dev Transfers ownership of the contract to a new account (`newOwner`).
   * Can only be called by the current owner.
   */
  function transferOwnership(address newOwner) public onlyOwner {
    _transferOwnership(newOwner);
  }

  /**
   * @dev Transfers ownership of the contract to a new account (`newOwner`).
   */
  function _transferOwnership(address newOwner) internal {
    require(newOwner != address(0), "Ownable: new owner is the zero address");
    emit OwnershipTransferred(_owner, newOwner);
    _owner = newOwner;
  }
}
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

    constructor(address _stakingToken) {
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
