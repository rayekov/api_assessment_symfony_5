<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jobs;
use App\Repository\JobsRepository;

class JobsController extends AbstractController
{
    public function __construct(private JobsRepository $jobs)
    {
    }

    #[Route('/jobs', name: 'jobs')]
    #[Route('/jobs/{from}/{to}/{company}', name: 'jobs_filtered')]
    public function index($from=null,$to=null,$company=[]): Response
    {
    $em = $this->getDoctrine()->getManager();
    $connection = $em->getConnection();

    if(!is_null($from) && !is_null($to)){
        if(!empty($company)){

            $statement = $connection->prepare("SELECT * FROM jobs WHERE date_published BETWEEN '$from' AND '$to' AND company_id IN '$company'");
            
        }else {
            $statement = $connection->prepare("SELECT * FROM jobs WHERE date_published BETWEEN '$from' AND '$to'");
        }
       // $statement->execute();
       // var_dump($statement);die();
        $jobList = $statement->fetchAll();   
    }else{
    
    $jobList = $this->jobs
            ->findAll();
    }
        $data = [];
 
        foreach ($jobList as $job) {
           $data[] = [
               'id' => $job->getId(),
               'job' => $job->getJob(),
               'job_ref' => $job->getJobRef(),
               'company' => $job->getCompanyId()->getCompany(),
               'link' => $job->getLink(),
               'profession' => $job->getProfessionId()->getProfession(),
               'division' => $job->getDivisionId()->getDivision(),
               'role' => $job->getRoleId()->getRole(),
               'date_published' => $job->getDatePublished(),
               'refkey' => $job->getRefkey(),   
              
           ];
        }
        return $this->json($data, 200, ["Content-Type" => "application/json"]);
 
 
    }
}
