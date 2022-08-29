<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Customer;

class ImportCustomerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api Import Customer to Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $res = $client->request('GET', "https://randomuser.me/api/?results=100&nat=AU");
        $response  = json_decode($res->getBody());

        foreach($response->results as $customer) {
            try {

                $insert_customer = array(
                    "name" => $customer->name->first . " " . $customer->name->last,
                    "email" => $customer->email,
                    "username" => $customer->login->username,
                    "password" => $customer->login->md5,
                    "gender" => $customer->gender,
                    "country" => $customer->location->country,
                    "city" => $customer->location->city,
                    "phone" => $customer->phone,
                );

                $emailExist = Customer::where('email', $customer->email)->first();

                if ($emailExist) {
                    Customer::where('id', $emailExist->id)
                        ->update([
                            "name" => $customer->name->first . " " . $customer->name->last,
                            "username" => $customer->login->username,
                            "password" => $customer->login->md5,
                            "gender" => $customer->gender,
                            "country" => $customer->location->country,
                            "city" => $customer->location->city,
                            "phone" => $customer->phone,
                        ]);
                } else {
                    Customer::insertGetId($insert_customer);
                }

           } catch(\Exception $x) {

                return PHP_EOL.'Error Importing Customer ID : ' . $customer->login->uuid . ' ( '.$x->getMessage().' ) \/';
                exit;
            }
        }
    }
}
