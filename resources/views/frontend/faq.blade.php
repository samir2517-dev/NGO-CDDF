@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>FAQ</li>
      </ol>
      <h2>Frequently Asked Questions</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Frequently Asked Questions</h2>
            <div class="accordion accordion-flush border rounded" id="accordionFlushExample">
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <strong>What is AFAD's mission?</strong>
                    </button>
                    </h3>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            AFAD's mission is to empower communities, foster resilience, and drive positive change through various programs and initiatives aimed at addressing social, economic, and environmental challenges.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <strong>How can I get involved with AFAD?</strong>
                    </button>
                    </h3>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            You can get involved with AFAD by volunteering your time, donating to our cause, or participating in our events and programs. Visit our website or contact us directly to learn more about opportunities for involvement.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <strong>How does AFAD ensure transparency and accountability?</strong>
                    </button>
                    </h3>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            AFAD is committed to transparency and accountability in all aspects of our operations. We regularly publish financial reports, impact assessments, and program evaluations to ensure that our stakeholders are informed and engaged.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <strong>What impact has AFAD made in the community?</strong>
                    </button>
                    </h3>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            AFAD has made a significant impact in the community by implementing projects and initiatives that have improved the lives of thousands of people. From providing access to education and healthcare to promoting sustainable livelihoods, AFAD's work has positively transformed communities across the region.
                        </div>
                    </div>
                </div>
                </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
