@extends('Layout.layout')
@section('contact-us')
 <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE"></script>
    <style>
        /* Cài đặt kích thước cho bản đồ */
        .beta-map {

            height: 300px;
            width: 100% !important;
        }
        .beta-map iframe {
            width: 100% !important;
            height: 100% !important;
            border-radius: 20px;
        }
        .form{
            background-color: #fff;
            border-radius: 20px;

        }

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
@endsection
@section('content')

<body>
         @include('components.notification')
        <main>
            <div class="beta-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.963509169906!2d108.23874031531907!3d16.059173753263245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177efcf09dd9%3A0x368399fdd4cb41e5!2sPh%C6%B0%E1%BB%9Bc%20M%E1%BB%B9%2C%20S%C6%A1n%20Tr%C3%A0%2C%20Da%20Nang%20550000%2C%20Vietnam!5e0!3m2!1sen!2s!4v1407828576904" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>


            <div class="title">Contact us</div>
            <div class="title-info">We'll get back to you soon!</div>
            
            <form action=" {{route('contact-us.store')}} " method="post" class="form">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="input-group">
                    <input type="text" name="first_name" id="first-name" placeholder="First name"
                    @if(isset($user) && !empty($user->first_name))
                        value="{{ $user->first_name }}"
                    @else{
                        value="{{ old('first_name') }}"
                    }
                    @endif>
                    <label for="first-name">First name</label>
                </div>
                @error('first_name')
                <span style="color:red;">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <input type="text" name="last_name" id="last-name" placeholder="Last Name"   @if(isset($user) && !empty($user->last_name))
                        value="{{ $user->last_name }}"
                    @else{
                        value="{{ old('last_name') }}"
                    }
                    @endif >
                    <label for="last-name">Last name</label>
                </div>
                @error('last_name')
                <span style="color:red;">{{ $message }}</span>
                @enderror

                <div class="input-group">
                    <input type="email" name="email" id="e-mail" placeholder="e-mail"  @if(isset($user) && !empty($user->email))
                        value="{{ $user->email }}"
                    @else{
                        value="{{ old('email') }}"
                    }
                    @endif >
                    <label for="e-mail">E-mail</label>
                </div>
                @error('email')
                <span style="color:red;">{{ $message }}</span>
                @enderror
                <div class="textarea-group">
                    <textarea name="message" id="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                    <label for="message">Message</label>
                </div>
                @error('message')
                <span style="color:red;">{{ $message }}</span>
                @enderror
                <div class="button-div">
                    <button id="contactBtn" type="submit">Send</button>
                </div>
            </form>
            @include('components.team')
        </main>
<style>
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

main
{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 90%;
    margin: auto;
}

.title
{
    font-size: 50px;
    font-weight: bold;
    padding: 1.5% 0;
}

.title-info
{
	padding-bottom: 2%;
}

.form
{
    display: flex;
    flex-direction: column;
    width: 60%;
    box-shadow: 0 0 10px #77DAE6;
    padding: 2%;
}

.input-group, .textarea-group
{
    padding: 1% 0;
}

input, textarea
{
    color: inherit;
    width: 100%;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #757575;
    padding: 1.5%;
    font-size: 20px;
}

input:focus, textarea:focus
{
    background-color: transparent;
    outline: transparent;
    border-bottom: 2px solid #69f0ae;
}

input::placeholder, textarea::placeholder
{
    color: transparent;
}

label
{
    color: #757575;
    position: relative;
    left: 0.5em;
    top: -2em;
	cursor: auto;
    transition: 0.3s ease all;
}

input:focus ~ label, input:not(:placeholder-shown) ~ label
{
    top: -4em;
    color: #69f0ae;
    font-size: 15px;
}

textarea:focus ~ label, textarea:not(:placeholder-shown) ~ label
{
    top: -10.5em;
    color: #69f0ae;
    font-size: 15px;
}

.button-div
{
    display: flex;
    justify-content: center;
}

#contactBtn
{
    padding: 2%;
    width: 50%;
    border: 1px solid;
    border-color: #77DAE6;
    border-radius: 5px;
    font-family: inherit;
    font-size: 18px;
    background-color: #77DAE6
    color: inherit;

    border-radius: 20px
}

#contactBtn:hover
{
    background-color: #77DAE6;
    color: beige;
    cursor: pointer;
}


/* Media queries */

@media screen and (max-width: 1200px)
{
    .form
    {
        width: 70%;
    }
}

@media screen and (max-width: 680px)
{
    .form
    {
		width: 90%;
    }
}

@media screen and (max-width: 500px)
{
	.title
	{
		font-size: 40px;
		padding-top: 6%;
	}

	.title-info
	{
		font-size: 13px;
	}

	.form
	{
		padding: 6% 4%;
		padding-top: 15%;
	}

	.input-group, .textarea-group
    {
		padding: 3% 0;
	}

	input, textarea
	{
		font-size: 15px;
	}

	input:focus ~ label, input:not(:placeholder-shown) ~ label
	{
		top: -3.5em;
		left: 0.1em;
	}

	textarea:focus ~ label, textarea:not(:placeholder-shown) ~ label
	{
		top: -8.5em;
		left: 0.2em;
    }

    button
    {
        font-size: 15px;
    }
}
</style>
@endsection