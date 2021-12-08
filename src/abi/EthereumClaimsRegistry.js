const EthereumClaimsRegistry = {
  "abi": [
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "address",
          "name": "claimHolder",
          "type": "address"
        }
      ],
      "name": "ClaimHolderAdded",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "claimHolder",
      "outputs": [
        {
          "internalType": "contract xClaimHolder",
          "name": "",
          "type": "address"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "addClaimHolder",
      "outputs": [
        {
          "internalType": "address",
          "name": "contractAddr",
          "type": "address"
        }
      ],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "holder",
          "type": "address"
        },
        {
          "internalType": "uint256",
          "name": "_claimType",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_scheme",
          "type": "uint256"
        },
        {
          "internalType": "address",
          "name": "_issuer",
          "type": "address"
        },
        {
          "internalType": "bytes",
          "name": "_signature",
          "type": "bytes"
        },
        {
          "internalType": "bytes",
          "name": "_data",
          "type": "bytes"
        },
        {
          "internalType": "string",
          "name": "_uri",
          "type": "string"
        }
      ],
      "name": "addClaim",
      "outputs": [
        {
          "internalType": "bytes32",
          "name": "claimID",
          "type": "bytes32"
        }
      ],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "holder",
          "type": "address"
        },
        {
          "internalType": "bytes32",
          "name": "_claimId",
          "type": "bytes32"
        }
      ],
      "name": "removeClaim",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "holder",
          "type": "address"
        },
        {
          "internalType": "bytes32",
          "name": "_claimId",
          "type": "bytes32"
        }
      ],
      "name": "getClaim",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "claimType",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "scheme",
          "type": "uint256"
        },
        {
          "internalType": "address",
          "name": "issuer",
          "type": "address"
        },
        {
          "internalType": "bytes",
          "name": "signature",
          "type": "bytes"
        },
        {
          "internalType": "bytes",
          "name": "data",
          "type": "bytes"
        },
        {
          "internalType": "string",
          "name": "uri",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "holder",
          "type": "address"
        },
        {
          "internalType": "uint256",
          "name": "_claimType",
          "type": "uint256"
        }
      ],
      "name": "getClaimIdsByType",
      "outputs": [
        {
          "internalType": "bytes32[]",
          "name": "claimIds",
          "type": "bytes32[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "addr",
          "type": "address"
        }
      ],
      "name": "getClaimHolder",
      "outputs": [
        {
          "internalType": "contract xClaimHolder",
          "name": "",
          "type": "address"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    }
  ],
      address: '0x96FD36fE4bcFB9847e087a9b52Df1Ae99F7379Fc'

}
export {EthereumClaimsRegistry};