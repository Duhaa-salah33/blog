@extends('main')
@section('title','| Contactpage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Contact Us
                </h1>
               <form>
                   <div class="form-group">
                       <label name="email">Email : </label>
                       <input id="email" name="email" class="form-control" placeholder="example@email.com">
                   </div>
                   <div class="form-group">
                       <label name="subject">subject : </label>
                       <input id="subject" name="subject" class="form-control" placeholder="subject">
                    </div>
                   <div class="form-group">
                       <label name="message">Message : </label>
                       <textarea id="message" name="message" class="form-control" placeholder="Type Your Message here..."></textarea>
                   </div>
                   <input type="submit" value="Send Message" class="btn btn-success">
               </form>
            </div>
        </div>
    </div>
@endsection

   



