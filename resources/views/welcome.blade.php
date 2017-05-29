<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel with Vue</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
        <link rel="stylesheet" href="https://dansup.github.io/bulma-templates/css/bulma.css">
        <link rel="stylesheet" href="https://dansup.github.io/bulma-templates/css/base.css">

    </head>
    <body>
        <div id="root">
            {{--@include('layouts.nav')--}}

            <div class="section">
                <div class="container">
                    <div class="columns">
                        <div class="column is-4 is-offset-5">
                            <div class="title">Add your idea</div>
                        </div>
                        </div>
                    <div class="colums">
                        <div class="column is-8 is-offset-2">
                            <form action="/suggestions" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                                {{csrf_field()}}
                                <label class="label" for="name">Name</label>
                                <p class="control">
                                    <input class="input" type="text" id="name" name="name" placeholder="Your name" v-model="form.name">
                                    <span class="help is-danger" v-text="form.errors.get('name')" v-if="form.errors.has('name')"></span>
                                </p>


                                <label class="label" for="suggestion">Suggestion</label>
                                <p class="control">
                                    <textarea class="textarea" type="text" id="suggestion" name="description" placeholder="We'd be thrilled to know your suggestion!" v-model="form.description"></textarea>
                                    <span class="help is-danger" v-text="form.errors.get('description')" v-if="form.errors.has('description')"></span>
                                </p>

                                <p class="control">
                                    <button class="button is-primary" :disabled="form.errors.any()">Add</button>
                                </p>
                            </form>
                            {{--@include('layouts.errors')--}}
                        </div> <!--End column div -->

                    </div> <!--End columns div-->
                </div> <!--End container div-->
                    <hr>
                {{--<ul>--}}
                {{--@foreach($suggestions as $suggestion)--}}
                    {{--<li>--}}
                        {{--<article class="message is-primary">--}}
                            {{--<div class="message-header">--}}
                                {{--Added by {{$suggestion->name}} | {{$suggestion->created_at->diffForHumans()}}--}}
                            {{--</div>--}}
                            {{--<div class="message-body">--}}
                                {{--{{$suggestion->description}}--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</li>--}}
                    {{--<br>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}

            {{--@include('layouts.footer')--}}
            </div>
        </div>

        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
