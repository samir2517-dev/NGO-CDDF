@extends('main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li>What we do</li>
    </ol>
    <h2>Key Focus Area</h2>
  </div>
</section>
<!--  End Breadcrumbs  -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Key Focus Area</h2>
        <div class="row p-3">
            <div class="col-md-6 alert alert-primary rounded-0 p-2 m-0">
                <img src="{{ asset('img/key_area/power.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Women Empowerment</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD mainly focuses on women empowerment, eradicating the gender Based Violence in community level, sub-distrit, district and national level.  AFAD undertakes initiatives that empower the destitute and neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them. AFAD  works on acclerating the women dignity and eqaul opportunity. AFAD sensitizes the government and non-government institutions for strengthening the socio-economic status of women, and ensuring the full enforcement of such arrangement though training and advocacy. It also sensitizes and influences the different level of stakeholders (policy makers, local government representatives, media, communities and religious leaders) on GVB. AFAD provides the income generation training to the women for the socio-economic empowerment.
                </p>
            </div>

            <div class="col-md-6 alert alert-warning p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/women.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Community Empowerment</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD believes Community empowerment is only possible when everyone’s voices are heard. Women’s voices, particularly those living in poverty, are often unheard. Women often have the least power in communities, usually not knowing their rights or how to realize them, meaning the potential of half the population is not realized. As a result, AFAD Providing people, especially women living in poverty, with the tools to claim entitlements, develop leadership and take collective action through community-level organizations. In parallel, equipping local governments to be more accountable and responsive, creating violence-free enabling environments for women through realizing their potential, and increasing access to information and services. <br>
                    AFAD works on strengthening women-led community based organizations to uphold voices and realize their rights. Awareness for prevention and action to address violence, particularly against women and children. At the same time, though increasing access to the the information, AFAD creating sustainable impact as institutions become more accountable and pro-poor through ensuring access of the community to information.
                </p>
            </div>

            <div class="col-md-6 alert alert-info p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/livelihood.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Livelihood</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD is playing influential role in the development sectors for bringing a sustainable livelihoods and social changes of the women.  AFAD try to  Improve the livelihoods, income and food security of extremely poor women, children and men living on the norther Baangladesh particularly the  island char. AFAD  provide technical skills training, grants or interest-free loans to procure a viable market asset or start a business. Promoting agricultural farming, disaster preparedness, livelihood security, access to finance and micro-enterprise as means of income. AFAD works  for the market linkage.
                </p>
            </div>

            <div class="col-md-6 alert alert-danger p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/social.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Social Protection</h6>
                <p class="fs-6" style="text-align: justify;">
                    Ensure access to health, education and employment opportunities, through community mobilization and linkages with government services, social safety net programs and emergency relief during crises.
                </p>
            </div>

            <div class="col-md-6 alert alert-primary p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/mobilization.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Community Mobilization</h6>
                <p class="fs-6" style="text-align: justify;">
                    Local committees formed with key village members to create a supportive environment for people to access social protection, support and governmentservices.
                </p>
            </div>

            <div class="col-md-6 alert alert-warning p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/engage.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Engagement with Government</h6>
                <p class="fs-6" style="text-align: justify;">
                    Close collaboration and coordination with the government to ensure services and social safety net programs are in alignment with national plans.
                </p>
            </div>

            <div class="col-md-6 alert alert-info p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/women.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Empowerment of girls and women</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD also includes the relationship between individual human capabilities of girls and women; and the capability to act collectively with men through youth club/groups, adolescent girls group.  Formation of youth group (girls and boys) and regular meetings, establishing girls recreation centre/place, mothers gathering, couple sessions, public awareness raising (highlighting the contribution of women and girls) through video show, folk songs, popular theatre, debate, essay competition, cultural events at school, college and Madrashas, different significant day observation, Youth leadership development, mobilization of women and men through demonstration and rallies will be the part of the processes. <br> <br>
                    Sensitisation and engagement of men, parents, youth (boys) and duty bearers:  AFAD will involve and sensitise men including parents, spouse, youth (boys), social opinion leaders, civil society members, the duty bearers, to extend their proactive support to the struggle of women and girls.   Couple sessions, meeting, workshops, lobbying, activation of standing committees on violence against women and children, involvement of elected representatives etc. are regularly been organizing.
                </p>
            </div>

            <div class="col-md-6 alert alert-danger p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/social.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Network building of WROs</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD will also develop the capacity of the WROs and establish a network of WROs in Kurigram district. For the purpose of identify, select other WROs working in the district and invite them to form a district level network. Meetings of network members, participation in different joint events of the project and collective response against any rights violation will be process of network building. The network members will participate in different training and capacity building events organized by AFAD. It is expected that through institutionalise the collective power, the networks of WROs enhance their capacities to work together, organize themselves and mobilize to solve the social norms and attitude that hampers security and safe environment for women.
                </p>
            </div>

            <div class="col-md-6 alert alert-primary p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/wash.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">WASH</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD works to esnure the safe drinking water of the Community based and Community Level Appropriate technologies for safe water sources and developing water entrepreneurs for areas where natural water sources are contaminated with arsenic, iron or salinity.  Apart from this AFAD motivate households to install twin pit latrines for safe disposal and management of human waste. AFAD also held to community led initiatives for establishing the hand washing stations, gender-specific latrines with menstrual hygiene management facilities.
                </p>
            </div>

            <div class="col-md-6 alert alert-warning p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/disable.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Person with disabilities & transgender</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD tries couselling the familities, making awareness, arranging vocational training and income generation activities trainting to the persons with disabilities and transgender community.
                </p>
            </div>

            <div class="col-md-6 alert alert-info p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/humanitarians.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Humanitarian response</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD with partnership of government, INGO, NNGO implements projects & establish disaster management systems in our emergency response. Its‘ humanitarian actions include saving lives & livelihoods, providing food security, shelter, water, sanitation & hygiene as well as building communities' resilience to shock & capacity to adapt any emergency situation. Any kind the of humanitarian emergency, AFAD always reposne first whether any devastating flood situation or after any severe cyclone.
                </p>
            </div>

            <div class="col-md-6 alert alert-danger p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/social.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Advocacy and Networking</h6>
                <p class="fs-6" style="text-align: justify;">
                    Advocacy is the one of the key strong area of AFAD. It is the member of the following coordination committees and bodies in Sdistrict and upazilla level and play active role in decision making process: District tusk force Committee, Kurigram, District WID Committee, Kurigram , Madakdraba Neontraun & Pracharana Committee, Sadar Upazilla, Kurigram, Barianga selection committee,Sadar Upazilla, Kurigram, Stakeholder Committee, Kurigram Sadar Hospital, VAW Cimmittee, Kurigram Sadar Hospital, Town Level Coordination Committee (TLCC), Municipality, Kurigram, Device distribution Committee, Kurigram Sadar Upazilla, Kurigram, District and Upazila Committee on Disability and Development and Kurigram NGO Association. Shishu Kallayan Board member Sadar Kurigram. AFAD is the netwok member of Bangladesh Women Humanitarian Platform(BWHP), Disadvantaged Adolescent Working NGOs(DAWN) Forum, NAHAB(National Alliance of Humanitarian Actors, Bangladesh. Apart from this AFAD is the member of South Asia Network Women Rights in Disaster (SANWID). Advocacy is the key strengthen area of AFAD particularly in different socio-economic, cultuaral, and enviromental issue. AFAD also work with the different CSO network and Community based organization.
                </p>
            </div>

            <div class="col-md-6 alert alert-primary p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/climate.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Climate Change, adaptation, resilience</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD undertakes different initiatives for Climate change, adaptative, mitigation as well as resilience issues. AFAD regularuly advoacacy for the above issues in local and national level. AFAD conducts awareness, policy dialogues, seminars for this particluar issues. AFAD focuses on the Internal Displaced people due to disater and climate change for the uplifting their socio-economic conditions. AFAD promoting  different Climate Adapative income generating technologies (CAIGT) in the kurigram district particularly in the Char Island.
                </p>
            </div>

            <div class="col-md-6 alert alert-warning p-2 rounded-0 m-0">
                <img src="{{ asset('img/key_area/humanitarians.png') }}" alt="Women Empowerment" class="w-25 -circle">
                <h6 class="fs-4">Believing in localization and localization of humanitarian Aid</h6>
                <p class="fs-6" style="text-align: justify;">
                    AFAD believes in localization of humanitarian aid following the commitment of Grand Bargain and Principles of Partnership (PoP).
                </p>
            </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->

@endsection
