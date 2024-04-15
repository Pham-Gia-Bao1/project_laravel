
@extends('admin.Layout')
@section('main_content_admin')


<form id="fom_send_mail" action="{{ route('sendMail') }}">
    <h1>From replies</h1>

    <input type="hidden" name="email_user" value="{{ $email_user }}">

    <div>
        <p>Replies to : <strong>{{ $email_user }}</strong></p>
    </div>
    <div>
        <p>User's question : <strong>{{ $message_user_sent }}</strong></p>
    </div>
    <div>
        <label for="mail_message">Mail's message</label>
    <textarea name="message" id="mail_message" cols="30" rows="10"></textarea>
    </div>
    <button>
        Send
    </button>
</form>
<style>
/* Style the form container */
#fom_send_mail {
    max-width: auto;
    padding: 20px;
    background-color: #f9f9f9;
    margin: 40px;
    border-radius: 20px;
}

/* Style the form header */
#fom_send_mail h1 {
    text-align: center;
    color: #333;
    font-size: 35px;
}

/* Style the form fields */
#fom_send_mail label {
display: block;
margin-bottom: 5px;
color: #666;
}

#fom_send_mail textarea {
width: 100%;
padding: 10px;
border-radius: 5px;
resize: vertical; /* Allow vertical resizing */
}

/* Style the form button */
#fom_send_mail button {
width: 30%;
padding: 10px;
border: none;
border-radius: 5px;
background-color: #007bff;
color: #fff;
cursor: pointer;
margin: 20 0 20 0;
margin-top: 10px;
}

/* Style the form button on hover */
#fom_send_mail button:hover {
background-color: #0056b3;
}

</style>
@endsection

