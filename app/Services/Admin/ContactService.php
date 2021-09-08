<?php

namespace App\Services\Admin;

use App\Models\Contact;

class ContactService
{
    public function fetchAllWithPaginate()
    {
        return Contact::query()->get();
    }

    public function createNewContact(array $validated)
    {
        $contact = new Contact();
        $contact->phone = $validated['phone'];
        $contact->address = $validated['address'];
        $contact->email = $validated['email'];
        $contact->save();
        return $contact;
    }

    public function updateExistingContact(array $validated, Contact $contact)
    {
        $contact->phone = $validated['phone'];
        $contact->address = $validated['address'];
        $contact->email = $validated['email'];
        $contact->save();
        return $contact;
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
    }
}



?>
