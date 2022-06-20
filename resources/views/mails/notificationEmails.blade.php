@component('mail::message')
@if($data['type'] == 'user-contact')
Dear {{ $data['name'] }},

We have received your message, we will get back to you as soon as possible

@endif

@if($data['type'] == 'admin-contact')
Dear {{ $data['name'] }},

New Contact form, find details below:

Name: {{ $data['name'] }}

Email: {{ $data['email'] }}

Phone: {{ $data['phone'] }}

Message: {{ $data['message'] }}

@endif

@if($data['type'] == 'new_product_user')
Dear {{ $data['name'] }},

We have received your payment of &#8358;{{ $data['amount'] }} for {{ $data['product_name'] }},

Your payment transaction number is: {{ $data['reference'] }}

God bless you immensely!

@endif

@if($data['type'] == 'new_product_admin')
Dear Admin,

New Payment received, find details below:

Name: {{ $data['name'] }}

Email: {{ $data['email'] }}

Amount: &#8358;{{ $data['amount'] }}

Product: {{ $data['product_name'] }}

Transaction number: {{ $data['reference'] }}

Thank you!

@endif

Regards

{{ config('app.name') }}
@endcomponent