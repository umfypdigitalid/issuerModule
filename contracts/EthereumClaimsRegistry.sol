// SPDX-License-Identifier: MIT
pragma solidity >=0.4.22 <0.9.0;
import "./xClaimHolder.sol";
import "./xKeyHolder.sol";

contract EthereumClaimsRegistry {
    address public owner;
    event ClaimHolderAdded(address claimHolder);

    mapping(address => xClaimHolder) public claimHolder;

    constructor() {
        owner = msg.sender;
    }

    function addClaimHolder() public returns (address contractAddr) {
        require(msg.sender == owner, "You are not the owner");
        xClaimHolder holder = new xClaimHolder();
        contractAddr = address(holder);
        claimHolder[contractAddr] = holder;
        emit ClaimHolderAdded(address(holder));
        return contractAddr;
    }

    function addClaim(
        address holder,
        uint256 _claimType,
        uint256 _scheme,
        address _issuer,
        bytes memory _signature,
        bytes memory _data,
        string memory _uri
    ) public returns (bytes32 claimID) {
        return
            claimHolder[holder].addClaim(
                _claimType,
                _scheme,
                _issuer,
                _signature,
                _data,
                _uri
            );
    }

    function removeClaim(address holder, bytes32 _claimId) public {
        claimHolder[holder].removeClaim(_claimId);
    }

    function getClaim(address holder, bytes32 _claimId)
        public
        view
        returns (
            uint256 claimType,
            uint256 scheme,
            address issuer,
            bytes memory signature,
            bytes memory data,
            string memory uri
        )
    {
        return claimHolder[holder].getClaim(_claimId);
    }

    function getClaimIdsByType(address holder, uint256 _claimType)
        public
        view
        returns (bytes32[] memory claimIds)
    {
        return claimHolder[holder].getClaimIdsByType(_claimType);
    }

    function getClaimHolder(address addr) public view returns (xClaimHolder) {
        return claimHolder[addr];
    }

    function destroy(address holder) public {
        require(msg.sender == owner, "You are not the owner");
        claimHolder[holder].destroy(payable(holder));
    }
}
