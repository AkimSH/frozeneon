@extends('layouts.app')

@section('content')
    <div class="posts">
        <h1 class="text-center">Posts</h1>
        <div class="container">
            <div class="row">
                <div class="col-4" v-for="post in posts" v-if="posts">
                    <div class="card">
                        <img :src="'images' + post.img" class="card-img-top" alt="Photo">
                        <div class="card-body">
                            <h5 class="card-title">Post - @{{post.id}}</h5>
                            <p class="card-text">@{{post.text}}</p>
                            <button type="button" class="btn btn-outline-success my-2 my-sm-0" @click="openPost(post.id)">Open post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="boosterpacks">
            <h1 class="text-center">Boosterpack's</h1>
            <div class="container">
                <div class="row">
                    <div class="col-4" v-for="boosterpack in boosterpacks" v-if="boosterpacks">
                        <div class="card">
                            <img :src="'/images/boosterpacks/box.png'" class="card-img-top" alt="Photo">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-success my-2 my-sm-0" @click="buyPack(boosterpack.id)">Buy boosterpack @{{boosterpack.price}}$
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        If You need some help about core - read README.MD in system folder
        <br>
        What we have done All posts: <a href="/main_page/get_all_posts">/main_page/get_all_posts</a> One post: <a
            href="/main_page/get_post/1">/main_page/get_post/1</a>
        <br>
        Just go coding Login: <a href="/main_page/login">/main_page/login</a> Make boosterpack feature <a
            href="/main_page/buy_boosterpack">/main_page/buy_boosterpack</a> Add money feature <a
            href="/main_page/add_money">/main_page/add_money</a>
    </div>
@endsection
