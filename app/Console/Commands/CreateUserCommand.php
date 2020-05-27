<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\User;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a admin account with this command';

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
      $sFirstname = $this->ask('Voornaam');
      $sMiddlename = $this->ask("Tussenvoegsel");
      $sLastname = $this->ask("Achternaam");
      $sPhone = $this->ask("Telefoonnummer");
      $sMail = $this->ask("Email");
      $sPassword = $this->secret("Password");
      $sPasswordConfirm = $this->secret("Password confirm");

      if ($sPassword == $sPasswordConfirm) {
        $oUser = new User();
        $oUser->email = $sMail;
        $oUser->firstname = $sFirstname;
        $oUser->middlename = $sMiddlename;
        $oUser->lastname = $sLastname;
        $oUser->password = bcrypt($sPassword);
        $oUser->role = 'admin';
        $oUser->is_accepted = true;
        $oUser->phone = $sPhone;
        $oUser->save();
        $this->info("Account has been made");
      }
      else {
        $this->error("Passwords are not equal");
      }
    }
}
