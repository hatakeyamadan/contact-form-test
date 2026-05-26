<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $contact['name'] = $contact['last_name'] . '　' . $contact['first_name'];
        $contact['tel'] = $contact['tel1']  . $contact['tel2'] . $contact['tel3'];
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }

    public function thanks(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function register()
    {
        return view('register');
    }
}
