<?php
class bottledMainSuite extends PHPUnit_Framework_TestSuite
{
   
    /**
     * Basic constructor for test suite
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName( 'bottled - experiments' );
        $this->addTestFile('experiments_tests.php');
        $this->addTestFile('storage_tests.php');
        $this->addTestFile('call_tests.php');
        $this->addTestFile('controller_manager/configurable_file_tests.php');
    }
    
    
    public static function suite()
    {
       return new bottledMainSuite( __CLASS__ );
    }

    protected function setUp()
    {
        
    }

    protected function tearDown()
    {
        
    }
}

