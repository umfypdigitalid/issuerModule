const xClaimVerifier = {
    "abi":[
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "_trustedClaimHolder",
                    "type": "address"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "constructor"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "bytes",
                    "name": "data",
                    "type": "bytes"
                }
            ],
            "name": "ClaimDataInvalid",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "bytes",
                    "name": "data",
                    "type": "bytes"
                }
            ],
            "name": "ClaimDataValid",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                }
            ],
            "name": "ClaimInvalid",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                }
            ],
            "name": "ClaimValid",
            "type": "event"
        },
        {
            "inputs": [
                {
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                }
            ],
            "name": "checkClaim",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "claimValid",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "claimType",
                    "type": "uint256"
                }
            ],
            "name": "claimIsValid",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "claimValid",
                    "type": "bool"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "bytes",
                    "name": "sig",
                    "type": "bytes"
                },
                {
                    "internalType": "bytes32",
                    "name": "dataHash",
                    "type": "bytes32"
                }
            ],
            "name": "getRecoveredAddress",
            "outputs": [
                {
                    "internalType": "address",
                    "name": "addr",
                    "type": "address"
                }
            ],
            "stateMutability": "pure",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "trustedClaimHolder",
            "outputs": [
                {
                    "internalType": "contract xClaimHolder",
                    "name": "",
                    "type": "address"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "contract xClaimHolder",
                    "name": "_identity",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "_claimType",
                    "type": "uint256"
                },
                {
                    "internalType": "bytes",
                    "name": "_data",
                    "type": "bytes"
                }
            ],
            "name": "verifyClaimData",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "nonpayable",
            "type": "function"
        }
    ], address:"0xBa148fe9CB81Bc98d3C94d388A7E25365dC2ceF5"
}
export {xClaimVerifier};