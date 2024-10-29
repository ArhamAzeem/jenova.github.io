@extends('frontend_partials.main_layout')
@section('front_title', 'About')

@section('main_content')
<div class="container-fliud">
    <div class="row d-flex shop flex-row justify-content-center align-items-center py-5 fw-bolder fs-1">
        About
    </div>
</div>

<div class="container p-5 d-flex flex-column justify-content-center align-items-center gap-3">
    <h1 class='text-danger fw-bolder fs-1'>Our Company History</h1>
    <p class="text-base-50 w-50 text-center">Our journey began with a passion for elegance and beauty. Since our
        inception, we've dedicated ourselves to offering the finest cosmetics and exquisite jewelry. Our commitment to
        quality and craftsmanship has made us a beloved brand for those who seek sophistication and luxury.</p>
</div>

<div class="container">
    <div class="row">
        <div class="col col-12 col-md-4">
            <div class='w-75'>
                <h3 class='text-danger fw-bold text-center'>2020-22</h3>
                <p class='text-base-50 text-center'>Founded during a time of change, we set out to redefine beauty
                    standards with our premium range of skincare and makeup. Our focus was on delivering products that
                    not only enhance but also nurture.</p>
            </div>
        </div>
        <div class="col col-12 col-md-4 ">
            <div class='w-75'>
                <h3 class='text-danger fw-bold text-center'>2022-23</h3>
                <p class='text-base-50 text-center'>Our brand expanded into the world of fine jewelry, combining
                    timeless designs with modern aesthetics. This marked a new era for us, offering our customers a
                    one-stop destination for all their beauty and accessory needs.</p>
            </div>
        </div>
        <div class="col col-12 col-md-4">
            <div class='w-75'>
                <h3 class='text-danger fw-bold text-center'>2023-25</h3>
                <p class='text-base-50 text-center'>Looking forward, we continue to innovate, introducing new product
                    lines and expanding our reach globally. Our commitment to sustainability and ethical sourcing
                    remains at the heart of everything we do.</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row p-5">
        <div class="col col-12 col-md-8">
            <h1 class='fw-bolder fs-1 text-danger'>What we Offer</h1>
            <p class='text-base-50'>At our store, we offer a curated selection of luxurious cosmetics and fine jewelry
                that cater to the modern individual. From skincare essentials that enhance your natural beauty to
                statement jewelry pieces that make every occasion special, we bring you the best of both worlds. Our
                dedication to quality ensures that every product you purchase is crafted with care and precision.</p>
        </div>
        <div class="col col-12 col-md-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTemA629lwusIuFuMQECNG-XVBLMuSi1dh6ew&s"
                class='img-fliud w-100 rounded-5' alt="">
        </div>
    </div>
</div>

<div class="container-fliud my-5 p-5 bg-danger-subtle">
    <div class="row">
        <div class="text-center">
            <h1 class='fw-bolder fs-1 text-danger'>Our Team</h1>
            <p class='fw-semibold fs-5'>Our team is a blend of experienced beauty experts and skilled artisans, each
                dedicated to delivering excellence.</p>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-column flex-md-row my-3">
            <div class="card border-0 bg-transparent" style="width: 12rem;">
                <img class="card-img-top img-profile rounded-circle shadow"
                    src="{{ asset('frontend_assets/Images/Jenny.jpg') }}"
                    alt="Card image cap">
                <div class="card-body text-center">

                    <p class="card-text fs-4 fw-bold text-danger">Jenny (Owner)</p>
                    <p class="card-text fs-5 fw-semibold text-dark">Business Owner and Visionary</p>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 12rem;">
                <img class="card-img-top img-profile rounded-circle shadow"
                    src="{{ asset('frontend_assets/Images/Maria.jpeg') }}"
                    alt="Card image cap">
                <div class="card-body text-center">

                    <p class="card-text fs-4 fw-bold text-danger">Maria</p>
                    <p class="card-text fs-5 fw-semibold text-dark">Operations Manager
                    </p>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 12rem;">
                <img class="card-img-top img-profile rounded-circle shadow"
                    src="{{ asset('frontend_assets/Images/Arham.jpg') }}" height='200px'
                    alt="Card image cap">
                <div class="card-body text-center">

                    <p class="card-text fs-4 fw-bold text-danger">Arham Azeem</p>
                    <p class="card-text fs-5 fw-semibold text-dark">Web App Dev</p>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 12rem;">
                <img class="card-img-top img-profile rounded-circle shadow"
                    src="{{ asset('frontend_assets/Images/Ahmed.jpg') }}"
                    alt="Card image cap">
                <div class="card-body text-center">

                    <p class="card-text fs-4 fw-bold text-danger">Ahmed Ali</p>
                    <p class="card-text fs-5 fw-semibold text-dark">Web App Dev</p>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 12rem;">
                <img class="card-img-top img-profile rounded-circle shadow"
                    src="{{ asset('frontend_assets/Images/Hassan.jpg') }}"  height='200px'
                    alt="Card image cap">
                <div class="card-body text-center">

                    <p class="card-text fs-4 fw-bold text-danger">Hassan</p>
                    <p class="card-text fs-5 fw-semibold text-dark">Web App Dev</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FAQS -->

<div class="container">
    <div class="row d-flex flex-row justify-content-center align-items-center py-5 fw-bolder fs-1 text-danger">
        Frequently Asked Questions
    </div>
    <div class="row">
        <div class="col col-12 col-md-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcST7xFLxAzCeTkBROYX4-Q0Tr37ZM2RhVCnlA&s"
                class='img-fliud w-100 rounded-5' alt="" style="height:100%;">

        </div>
        <div class="col col-12 col-md-8 px-5">
            <div class="accordion accordion-flush " id="accordionFlushExample" style="width:100%">
                <!-- The accordion items will be injected dynamically using JavaScript -->
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const faqData = [{
                        "question": "What is the best way to care for my jewelry?",
                        "answer": "Jewelry care involves keeping your pieces clean, storing them properly, and avoiding contact with chemicals. Regular polishing can help maintain their shine."
                    },
                    {
                        "question": "How often should I clean my skincare tools?",
                        "answer": "Skincare tools should be cleaned after every use to prevent bacteria buildup. Use a gentle cleanser or disinfectant to clean your tools."
                    },
                    {
                        "question": "What is the best way to store my cosmetics?",
                        "answer": "Store cosmetics in a cool, dry place, away from direct sunlight. For long-lasting freshness, keep them tightly sealed and avoid storing them in humid environments like bathrooms."
                    },
                    {
                        "question": "How do I choose the right skincare products for my skin type?",
                        "answer": "Determine your skin type (oily, dry, combination, sensitive) and choose products formulated to address your specific needs. If unsure, consult with a skincare professional."
                    },
                    {
                        "question": "How can I keep my jewelry looking new?",
                        "answer": "Regularly polish your jewelry with a soft cloth, avoid exposing it to harsh chemicals, and store each piece separately to prevent scratches."
                    },
                    {
                        "question": "What is the shelf life of most cosmetics?",
                        "answer": "Most cosmetics have a shelf life of 6 months to 2 years. Look for expiration dates and symbols indicating how long the product is good after opening."
                    },
                    {
                        "question": "How can I tell if a cosmetic product is expired?",
                        "answer": "Expired cosmetics often have changes in texture, color, or smell. Discard any product that seems off to avoid skin irritation or infections."
                    },
                    {
                        "question": "How do I care for delicate gemstones in my jewelry?",
                        "answer": "Delicate gemstones require special care. Avoid exposing them to heat, chemicals, or ultrasonic cleaners, and gently clean with a soft cloth and mild soap."
                    },
                    {
                        "question": "What are the benefits of using organic or natural beauty products?",
                        "answer": "Organic and natural beauty products are often free from harsh chemicals, making them gentler on the skin and reducing the risk of irritation or allergies."
                    }
                ];

                const accordionContainer = document.getElementById('accordionFlushExample');

                faqData.forEach((item, index) => {
                    const accordionItem = document.createElement('div');
                    accordionItem.className = 'accordion-item';
                    accordionItem.innerHTML = `
                <h2 class="accordion-header" id="flush-heading${index}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${index}" aria-expanded="false" aria-controls="flush-collapse${index}">
                        ${item.question}
                    </button>
                </h2>
                <div id="flush-collapse${index}" class="accordion-collapse collapse" aria-labelledby="flush-heading${index}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        ${item.answer}
                    </div>
                </div>
            `;
                    accordionContainer.appendChild(accordionItem);
                });
            });
            </script>

        </div>
    </div>
</div>
</div>
@endsection