

// SPDX-License-Identifier: MIT
pragma solidity ^0.8.16;

import "@openzeppelin/contracts/token/ERC1155/ERC1155.sol";

import "@openzeppelin/contracts/access/Ownable.sol";

library SafeMath {
    /**
     * @dev Returns the addition of two unsigned integers, reverting on
     * overflow.
     *
     * Counterpart to Solidity's `+` operator.
     *
     * Requirements:
     *
     * - Addition cannot overflow.
     */
    function add(uint256 a, uint256 b) internal pure returns (uint256) {
        uint256 c = a + b;
        require(c >= a, "SafeMath: addition overflow");

        return c;
    }

    /**
     * @dev Returns the subtraction of two unsigned integers, reverting on
     * overflow (when the result is negative).
     *
     * Counterpart to Solidity's `-` operator.
     *
     * Requirements:
     *
     * - Subtraction cannot overflow.
     */
    function sub(uint256 a, uint256 b) internal pure returns (uint256) {
        return sub(a, b, "SafeMath: subtraction overflow");
    }

    /**
     * @dev Returns the subtraction of two unsigned integers, reverting with custom message on
     * overflow (when the result is negative).
     *
     * Counterpart to Solidity's `-` operator.
     *
     * Requirements:
     *
     * - Subtraction cannot overflow.
     */
    function sub(
        uint256 a,
        uint256 b,
        string memory errorMessage
    ) internal pure returns (uint256) {
        require(b <= a, errorMessage);
        uint256 c = a - b;

        return c;
    }

    /**
     * @dev Returns the multiplication of two unsigned integers, reverting on
     * overflow.
     *
     * Counterpart to Solidity's `*` operator.
     *
     * Requirements:
     *
     * - Multiplication cannot overflow.
     */
    function mul(uint256 a, uint256 b) internal pure returns (uint256) {
        // Gas optimization: this is cheaper than requiring 'a' not being zero, but the
        // benefit is lost if 'b' is also tested.
        // See: https://github.com/OpenZeppelin/openzeppelin-contracts/pull/522
        if (a == 0) {
            return 0;
        }

        uint256 c = a * b;
        require(c / a == b, "SafeMath: multiplication overflow");

        return c;
    }

    /**
     * @dev Returns the integer division of two unsigned integers. Reverts on
     * division by zero. The result is rounded towards zero.
     *
     * Counterpart to Solidity's `/` operator. Note: this function uses a
     * `revert` opcode (which leaves remaining gas untouched) while Solidity
     * uses an invalid opcode to revert (consuming all remaining gas).
     *
     * Requirements:
     *
     * - The divisor cannot be zero.
     */
    function div(uint256 a, uint256 b) internal pure returns (uint256) {
        return div(a, b, "SafeMath: division by zero");
    }

    /**
     * @dev Returns the integer division of two unsigned integers. Reverts with custom message on
     * division by zero. The result is rounded towards zero.
     *
     * Counterpart to Solidity's `/` operator. Note: this function uses a
     * `revert` opcode (which leaves remaining gas untouched) while Solidity
     * uses an invalid opcode to revert (consuming all remaining gas).
     *
     * Requirements:
     *
     * - The divisor cannot be zero.
     */
    function div(
        uint256 a,
        uint256 b,
        string memory errorMessage
    ) internal pure returns (uint256) {
        require(b > 0, errorMessage);
        uint256 c = a / b;
        // assert(a == b * c + a % b); // There is no case in which this doesn't hold

        return c;
    }

    /**
     * @dev Returns the remainder of dividing two unsigned integers. (unsigned integer modulo),
     * Reverts when dividing by zero.
     *
     * Counterpart to Solidity's `%` operator. This function uses a `revert`
     * opcode (which leaves remaining gas untouched) while Solidity uses an
     * invalid opcode to revert (consuming all remaining gas).
     *
     * Requirements:
     *
     * - The divisor cannot be zero.
     */
    function mod(uint256 a, uint256 b) internal pure returns (uint256) {
        return mod(a, b, "SafeMath: modulo by zero");
    }

    /**
     * @dev Returns the remainder of dividing two unsigned integers. (unsigned integer modulo),
     * Reverts with custom message when dividing by zero.
     *
     * Counterpart to Solidity's `%` operator. This function uses a `revert`
     * opcode (which leaves remaining gas untouched) while Solidity uses an
     * invalid opcode to revert (consuming all remaining gas).
     *
     * Requirements:
     *
     * - The divisor cannot be zero.
     */
    function mod(
        uint256 a,
        uint256 b,
        string memory errorMessage
    ) internal pure returns (uint256) {
        require(b != 0, errorMessage);
        return a % b;
    }
}

contract NFTMarketplace is ERC1155,Ownable {
    using SafeMath  for uint256;
    struct NFT {
        uint256 tokenId;
        address owner;
        address creator;
        uint256 price;
        uint256 royaltyPercentage;
        uint256 totalSupply;
        uint256 availableSupply;
        bool isForSale;
    }
    struct Coupon {
        string code;
        uint256 discountPercentage;     // Discount percentage (e.g., 10%)
        bool isValid; // Whether the coupon code is valid or not
    }

    mapping(address => mapping(uint256 => NFT)) public nfts; // Mapping to store NFT info for each user

    mapping(string => Coupon) public coupons;

    event RoyaltyPaid(address indexed owner, uint256 tokenId, address indexed buyer, uint256 amount);

    constructor() ERC1155("https://www.coodingdessign.com/novarealchain/tokens/") Ownable(msg.sender) {   

     }

    function mint(uint256 _tokenId, uint256 _initialSupply, uint256 _price, uint256 _royaltyPercentage) external onlyOwner {
        _mint(msg.sender, _tokenId, _initialSupply, "");
        nfts[msg.sender][_tokenId] = NFT(_tokenId, msg.sender,msg.sender,_price, _royaltyPercentage, _initialSupply, _initialSupply, true);
    }
    
    function setPrice(uint256 _tokenId,address _owner, uint256 _price) external {
        require(msg.sender == nfts[_owner][_tokenId].owner, "Only owner can set price");
        nfts[_owner][_tokenId].price = _price;
    }


    // Function to add a new coupon code
    function addCoupon(string memory _code) public onlyOwner{
        // Check if the coupon code already exists
        require(!coupons[_code].isValid, "Coupon code already exists");
        
        // Add the coupon code to the mapping
        coupons[_code] = Coupon(_code, 10, true);
    }

    function buy(uint256 _tokenId,address _owner ,uint256 _amount,string memory _code) external payable {
        require(nfts[_owner][_tokenId].isForSale, "NFT not for sale");
        require(_amount > 0 && _amount <= nfts[_owner][_tokenId].availableSupply, "Invalid amount");
        uint256 totalPrice = nfts[_owner][_tokenId].price.mul(_amount);
        if(bytes(_code).length > 0){
            require(coupons[_code].isValid, "Invalid coupon code");
            totalPrice = totalPrice.sub((totalPrice.mul(coupons[_code].discountPercentage)).div(100));
        }
        require(msg.value >= totalPrice, "Insufficient payment");

        uint256 royaltyAmount = (totalPrice.mul(nfts[_owner][_tokenId].royaltyPercentage)).div(100);
        if (royaltyAmount > 0) {
            payable(nfts[_owner][_tokenId].creator).transfer(royaltyAmount);
            emit RoyaltyPaid(nfts[_owner][_tokenId].creator, _tokenId, msg.sender, royaltyAmount);
        }
        payable(nfts[_owner][_tokenId].owner).transfer(totalPrice.sub(royaltyAmount));
        _safeTransferFrom(nfts[_owner][_tokenId].owner, msg.sender, _tokenId, _amount, "");
        nfts[_owner][_tokenId].availableSupply -= _amount;
        uint256 _price=(msg.value).div(_amount);
        nfts[msg.sender][_tokenId].tokenId=_tokenId;
        nfts[msg.sender][_tokenId].owner=msg.sender;
        nfts[msg.sender][_tokenId].creator=nfts[_owner][_tokenId].creator;
        nfts[msg.sender][_tokenId].royaltyPercentage=nfts[_owner][_tokenId].royaltyPercentage;
        nfts[msg.sender][_tokenId].totalSupply=nfts[_owner][_tokenId].totalSupply;
        nfts[msg.sender][_tokenId].availableSupply+=_amount;
        nfts[msg.sender][_tokenId].price=_price;
        nfts[msg.sender][_tokenId].isForSale=false;

    }

    function resell(uint256 _tokenId,address _owner,uint256 _price,bool isForSale) external {
        require(msg.sender == nfts[_owner][_tokenId].owner, "Only owner can resell");
        nfts[_owner][_tokenId].price = _price;
        nfts[_owner][_tokenId].isForSale = isForSale;
    }
}