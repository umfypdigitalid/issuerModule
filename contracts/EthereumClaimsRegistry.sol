// SPDX-License-Identifier: MIT
pragma solidity >=0.4.22 <0.9.0;
import './xClaimHolder.sol';
import './xKeyHolder.sol';

contract EthereumClaimsRegistry is xClaimHolder{

    mapping(address => xClaimHolder) public claimHolder;
    
    function addClaimHolder() public returns (address newContract){
        xClaimHolder holder = new xClaimHolder();
        claimHolder[address(holder)] = holder;
        return address(holder);
    }

    function addClaim (  
        address holder,
        uint256 _claimType,
        uint256 _scheme,
        address _issuer,
        bytes memory _signature,
        bytes memory _data,
        string memory _uri
        ) public {
            claimHolder[holder].addClaim(_claimType,  _scheme,  _issuer, _signature, _data,  _uri);
    }

    function removeClaim(address holder, bytes32 _claimId)public {
        claimHolder[holder].removeClaim(_claimId);

    }

    function getClaim(address holder, bytes32 _claimId) public view {
        claimHolder[holder].getClaim(_claimId);
    }
    function getClaimIdsByType(address holder, uint256 _claimType) public view {
        claimHolder[holder].getClaimIdsByType(_claimType);
    }
   

}