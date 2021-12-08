const smartcontracts = {
  "abi": [
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "string",
          "name": "_fName",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "_age",
          "type": "uint256"
        }
      ],
      "name": "getInstructor",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_fName",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_age",
          "type": "uint256"
        }
      ],
      "name": "setInstructor",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    }
  ], address:'0x4940233DFdcC036b6209932A9aE767d55a3BaD0d'
}
export {smartcontracts};