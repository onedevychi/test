<?php

namespace App\Policies;

use App\Models\Contact;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any contacts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function view(User $user, Contact $contact)
    {
        $ldate = date('Y-m-d H:i:s');
        $lldate = strtotime($ldate);
        $date = $contact->created_at;
        $currentDate = strtotime($date);
        $futureDate = $currentDate+(24*3600);
        $formatDate = date("Y-m-d H:i:s", $futureDate);
        return $formatDate < $lldate;
    }

    /**
     * Determine whether the user can create contacts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Contact  $contact
     * @return mixed
     */
    public function update(User $user, Contact $contact)
    {
        return $user->id === $contact->user_id;    
    }

    /**
     * Determine whether the user can delete the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function delete(User $user, Contact $contact)
    {
        //
    }

    /**
     * Determine whether the user can restore the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function restore(User $user, Contact $contact)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function forceDelete(User $user, Contact $contact)
    {
        //
    }
}
