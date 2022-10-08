<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{


  public function nameProvider()
{
  return [
    ["John","Doe","John Doe"],
    ["Jane","Doe","Jane Doe"],
    ["John","Smith","John Smith"],
  ];
}
  /** 
 * @test 
 * @dataProvider nameProvider
 */
public function return_full_name($firstName, $lastName, $expect){

  $user = new User;

  $user->firstName = $firstName;

  $user->lastName = $lastName;
  
  $result = $user->getFullName();

  $this->assertEquals($expect, $result);

}

  /** @test */
  public function return_first_name_charactor_count(){
    
    $user = new User;

    $user->firstName = 'John';
    $user->lastName =  'Doe';

    $result = $user->getFirstNameCount();

    $this->assertEquals(4, $result);

  }
}