<?php

use Yii;

class PerformanceTest
{
    public function run()
    {
        $jmeter = new JMeter();

        // Create a new test plan
        $testPlan = $jmeter->createTestPlan('Users Load Test');

        // Create a new thread group
        $threadGroup = $jmeter->createThreadGroup('Users');
        $threadGroup->setNumThreads(100);
        $threadGroup->setRampUp(10); // seconds
        $threadGroup->setLoopCount(1);

        // Create a new HTTP sampler
        $sampler = $jmeter->createHTTPSampler();
        $sampler->setMethod('GET');
        $sampler->setPath('/users');

        // Add the sampler to the thread group
        $threadGroup->addSampler($sampler);

        // Add the thread group to the test plan
        $testPlan->addThreadGroup($threadGroup);

        // Run the test
        $jmeter->runTestPlan($testPlan);
    }
}
