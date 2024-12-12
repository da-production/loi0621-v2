<?php

namespace App\Rules;

use App\Models\Ticket;
use Illuminate\Contracts\Validation\Rule;

class IfLastTicketClosed implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $ticket = Ticket::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['owner',1]
        ])->select('status')
        ->latest()
        ->first();
        return is_null($ticket) ? true : $ticket->status;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'vous ne pouvez pas envoyer de nouveau ticket jusqu\'à ce que votre dernier sera traite';
    }
}
