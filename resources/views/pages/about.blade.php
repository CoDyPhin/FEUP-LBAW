@extends('layouts.app')

@section('content')
    <div class="backgroundimg"></div>
    <div class="about-div about-text my-5 mx-auto text-center">
        <h1 class="my-4 text-light">About us</h1>
        
        <p class="text-justify mb-3 text-light">RNG is an online platform focused on sharing news and reviewing gaming related content.

        In a world where gaming has increasingly gained popularity, it can be hard to keep up with new game releases as well as the feedback provided by the community as a whole. 
        
        Our platform emerges as a way for game developers and gamers to find relevant and accurate information regarding the games they love.</p>
    </div>
    <div class="container mw-md-75">
        <div class="members-container text-light pt-3">
        <h1 class="text-center">Our Team</h1>
        <div id="carouselExampleIndicators" class="carousel slide pt-5" data-bs-ride="carousel">
            <div class="carousel-indicators mb-0">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center" style="gap: 2vw">
                    <div class="image-container">
                        <img src={{asset('images/carlos.jpg')}} alt="Carlos Lousada's Photo">
                    </div>
                    <div class="team-element-information">
                        <h2>Carlos Lousada</h2>
                        <h4>Student</h4>
                        <p>Student at Mestrado Integrado em Engenharia Informática e Computação from Maia, Portugal, who loves artificial intelligence and machine learning.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center" style="gap: 2vw">
                        <div class="image-container">
                            <img src={{asset('images/filipe.jpg')}} alt="Filipe Recharte's Photo">
                        </div>
                        <div class="team-element-information">
                            <h2>Filipe Recharte</h2>
                            <h4>Student</h4>
                            <p>Student at Mestrado Integrado em Engenharia Informática e Computação from Madeira, Portugal, who loves web design and computer networks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center" style="gap: 2vw">
                        <div class="image-container">
                            <img src={{asset('images/david.jpg')}} alt="Jose David Rocha's Photo">
                        </div>
                        <div class="team-element-information">
                            <h2>José Rocha</h2>
                            <h4>Student</h4>
                            <p>Student at Mestrado Integrado em Engenharia Informática e Computação from Maia, Portugal, who loves web design and sports.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center" style="gap: 2vw">
                        <div class="image-container">
                            <img src= {{asset('images/queijos.jpg')}} alt="Pedro Queiros's Photo">
                        </div>
                        <div class="team-element-information">
                            <h2>Pedro Queirós</h2>
                            <h4>Student</h4>
                            <p>Student at Mestrado Integrado em Engenharia Informática e Computação from Penafiel, Portugal, who loves databases and backend development.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
    </div>
    <footer>x
    <div class="footer-content">
        <h2 class="text-light">RNG Inc © 2021. All rights reserved</h2>
    </div>
    </footer>
@endsection