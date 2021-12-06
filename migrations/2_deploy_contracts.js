//const smartContracts = artifacts.require("smartContracts");
//const xERC725 = artifacts.require("xERC725");
//const xERC735 = artifacts.require("xERC735");
const xKeyHolder = artifacts.require("xKeyHolder");
const xClaimHolder = artifacts.require("xClaimHolder");
const EthereumClaimRegistry = artifacts.require("EthereumClaimsRegistry");
//const xClaimVerifier = artifacts.require("xClaimVerifier");
//const xIdentity= artifacts.require("xIdentity");

module.exports =function (deployer) {
 // deployer.deploy(smartContracts);
  //deployer.deploy(xERC725);
 // deployer.deploy(xERC735);
  deployer.deploy(xKeyHolder, { gas: 4612388, from: "0xE6FB66aE1b6a51122DbA33b50BB7d95Ae06434C3" });
  deployer.deploy(xClaimHolder, { gas: 4612388, from: "0xE6FB66aE1b6a51122DbA33b50BB7d95Ae06434C3" });
 //for user deployer.deploy(xClaimHolder, { gas: 4612388, from: "0xe43afB91E36C0F66588896c37795b80B6DCcD526" });
 deployer.deploy(EthereumClaimRegistry, { gas: 6721975, from: "0xe43afB91E36C0F66588896c37795b80B6DCcD526" });


  //deployer.deploy(xClaimVerifier);
  //deployer.deploy(xIdentity);
};
