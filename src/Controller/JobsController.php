<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jobs;
use App\Repository\JobsRepository;

#[Route('/api', name: 'api_')]
class JobsController extends AbstractController
{
    public function __construct(private JobsRepository $jobs)
    {
    }

    #[Route('/jobs', name: 'jobs')]
    #[Route('/jobs/{from}/{to}/{company}', name: 'jobs_filtered')]
    public function index($from=null,$to=null,$company=null): Response
    {
    
    $em = $this->getDoctrine()->getManager();
    $connection = $em->getConnection();
    //var_dump($company);die();

    //we verify if user defines date range filter or company
    if(!is_null($from) && !is_null($to)){
        if(!is_null($company)){
            //we format the string to an array then we put it in a suitable form to be passed in our query
            $company= explode("-", $company);
            $statement = $connection->prepare("SELECT * FROM jobs WHERE date_published BETWEEN '$from' AND '$to' AND company_id IN (".implode(',',$company).")");
            
        }else {
            $statement = $connection->prepare("SELECT * FROM jobs WHERE date_published BETWEEN '$from' AND '$to'");
        }
       
        $jobList = $statement->executeQuery()->fetchAllAssociative();   
    
        $data = [];
 
        foreach ($jobList as $job) {
        //job is an array
           $data[] = [
               'id' => $job["id"],
               'job' => $job["job"],
               'job_ref' => $job["job_ref"],
               'company' => $job["company_id"],
               'link' => $job["link"],
               'profession' => $job["profession_id"],
               'division' => $job["division_id"],
               'role' => $job["role_id"],
               'date_published' => $job["date_published"],
               'refkey' => $job["refkey"],   
              
           ];
        }
    }else{
    
    $jobList = $this->jobs
            ->findAll();
    
        $data = [];
 
        foreach ($jobList as $job) {
           //job is an object
           $data[] = [
               'id' => $job->getId(),
               'job' => $job->getJob(),
               'job_ref' => $job->getJobRef(),
               'company_id' => $job->getCompanyId(),
               'link' => $job->getLink(),
               'profession_id' => $job->getProfessionId(),
               'division_id' => $job->getDivisionId(),
               'role_id' => $job->getRoleId(),
               'date_published' => $job->getDatePublished(),
               'refkey' => $job->getRefkey(),   
              
           ];
        }
    }
        return $this->json($data, 200, ["Content-Type" => "application/json"]);
 
 
    }
}
