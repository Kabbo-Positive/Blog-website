@component('mail::message')

<h3>New Message from {{ $contact_from_data ['email'] }}</h3>

<p>Name:{{ $contact_from_data['name'] }}</p>

<p>Subject:{{ $contact_from_data['subject'] }}</p>

<p>Message:{{ $contact_from_data['message'] }}</p>

<p>Message:{{ $contact_from_data['reply_message'] }}</p>

@endcomponent

