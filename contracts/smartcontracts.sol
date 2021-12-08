// SPDX-License-Identifier: MIT
pragma solidity >=0.4.22 <0.9.0;

contract smartcontracts {
    
   string fName;
   uint age;
   event getInstructor(string _fName, uint _age);

   function setInstructor(string memory _fName, uint _age) public {
       fName = _fName;
       age = _age;
       emit getInstructor(fName,age);
   }
   
  // function getInstructor() view public returns (string memory, uint) {
  //     return (fName, age);
 //  }
   
}