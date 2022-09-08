<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $mailchimp = new ApiClient();
            $mailchimp->setConfig([
                'apiKey' => config('mailchimp.apiKey'),
                'server' => config('mailchimp.serverPrefix')
            ]);

            $mailchimp->lists->addListMember(config('mailchimp.listId'), [
                'email_address' => $request->email,
                'status' => 'subscribed'
            ]);
        }
        catch(\Exception $e) {
            return redirect('/');
        }

        return back()->with('success', 'You are now signed app for our newsletter!');
    }
}
