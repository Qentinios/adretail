<?php

namespace App\Http\Controllers;

use App\Service\AdretailService;
use Illuminate\Http\Request;
use Session;

class AdretailController extends Controller
{
    /** AdretailService $adretailService */
    protected $adretailService;

    public function __construct(AdretailService $adretailService)
    {
        $this->adretailService = $adretailService;
    }

    /**
     * Gets jobs from text, returns in order
     * @param Request $request
     * @return string
     */
    public function make(Request $request){
        $input = $request->input("jobs");

        $jobs = $this->getJobsArray($input);

        if(!$jobs) {
            $request->session()->flash('error', 'Wrong format!');

            return view('welcome', ['text' => $input]);
        }

        if($this->areJobsDependOnThemselves($jobs)){
            $request->session()->flash('error', 'Jobs can’t depend on themselves!');

            return view('welcome', ['text' => $input]);
        }

        if($this->areJobsCircular($jobs)){
            $request->session()->flash('error', 'Jobs can’t have circular dependencies!');

            return view('welcome', ['text' => $input]);
        }

        $jobsOrdered = $this->orderJobs($jobs);

        $request->session()->flash('success', $this->adretailService->arrayToString($jobsOrdered));

        return view('welcome', ['text' => $input]);
    }

    /**
     * Get jobs array from text
     * @param $text
     * @return array
     */
    private function getJobsArray($text){
        $jobs = [];

        preg_match_all('/([a-z]) ?=> ?([a-z])?/', $text, $matches, PREG_SET_ORDER);

        // wrong format
        if(empty($matches[0])){
            return null;
        }

        foreach($matches as $match){
            $jobs[$match[1]] = isset($match[2]) ? $match[2] : "";
        }

        return $jobs;
    }

    /**
     * Return jobs in correct order
     * @param $jobs
     * @return array
     */
    private function orderJobs($jobs)
    {
        // create array of "a b c d e f"
        $order = array_keys($jobs);

        // loop thought all jobs
        foreach($jobs as $job=>$pre){

            // if job has predecessor
            if(!empty($pre) && in_array($pre, $order)){

                // position of job
                $offsetJob = array_search($job, $order);

                // array with predecessor as tmp before job
                $order = $this->adretailService->arrayInsertBefore($offsetJob, $order, 'tmp');


                // find offset of old predecessor we copied
                $offsetPre = array_search($pre, $order);

                // remove it
                unset($order[$offsetPre]);

                // change tmp to actual predecessor
                $offsetTmp = array_search('tmp', $order);
                $order[$offsetTmp] = $pre;
            }
        }

        return $order;
    }

    /**
     * Check if jobs have circular dependencies
     * @param $jobs
     * @return bool
     */
    private function areJobsCircular($jobs){
        // TODO
        return false;
    }

    /**
     * Check if jobs depend on themselves
     * @param $jobs
     * @return bool
     */
    private function areJobsDependOnThemselves($jobs)
    {
        foreach($jobs as $job => $pre){
            if($job == $pre){
                return true;
            }
        }

        return false;
    }
}
