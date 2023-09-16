<x-guest-layout>
    <x-custom.nav/>

    <section class="bgImage" id="home"></section>

    <section class="content-section bg-gray-100 py-16" id="welcome">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-8/12 md:pr-8 mb-8 md:mb-0">
                    <h2 class="text-3xl font-semibold mb-4">Welcome to BIN IT: Your Garbage Management Solution </h2>
                    <p class="mb-4">At BIN IT, we are committed to providing you with an efficient and eco-friendly
                        garbage
                        management
                        system. Our innovative solutions are designed to streamline waste collection, disposal, and
                        recycling processes, contributing to a cleaner and healthier environment.</p>
                    <p class="mb-4">Key Features:</p>
                    <ul class="list-disc ml-6 mb-4">
                        <li>Smart Bin Monitoring: Our advanced sensors track bin fill levels, optimizing collection
                            routes.
                        </li>
                        <li>Eco-Friendly Practices: We promote recycling and sustainable waste management techniques.
                        </li>
                        <li>User-Friendly Interface: Our user-friendly platform makes it easy to manage your waste
                            disposal
                            needs.
                        </li>
                        <li>Real-time Notifications: Receive alerts about scheduled collections and important updates.
                        </li>
                    </ul>
                    <a href="{{route('register')}}" class="font-bold text-2xl px-5 py-2 bg-green-400 rounded-xl">Get
                        Started</a>
                </div>
                <div class="md:w-4/12">
                    <img src="{{asset('/images/trash.jpg')}}" alt="Garbage Collection"
                         class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>
    <section class="services-section bg-gray-100 py-16" id="services">
        <div class="container mx-auto">
            <h2 class="text-2xl font-semibold text-center mb-8">Our Services</h2>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div
                        class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Recycling
                            Solutions</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">We promote responsible recycling
                            practices
                            to minimize waste and conserve resources.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div
                        class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Efficient
                            Collection</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Our smart bin monitoring ensures timely
                            and efficient waste collection routes.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div
                        class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sustainable
                            Solutions</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Join us in creating a sustainable future
                            through eco-friendly waste management practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16" id="aboutUs">
        <div class="container mx-auto">
            <h1 class="text-center text-green-500 text-3xl font-semibold mb-8">
                About Us
            </h1>

            <img src="{{asset('/images/trash2.jpg')}}" alt="Waste Management" class="w-1/3 mx-auto mb-8">

            <p class="text-justify mb-8">
                BIN-IT The Smart Move is a garbage management and complaint system located in Karnataka. Our mission is
                to
                provide a smart solution for waste disposal and management to individuals and businesses alike. We
                understand the importance of a clean environment and strive to make it possible for everyone.
            </p>

            <p class="text-justify mb-8">
                Our dedicated team ensures top-notch customer service and client satisfaction. We offer a range of
                garbage
                management solutions tailored to meet the unique needs of each client. With BIN-IT The Smart Move, your
                waste will be disposed of in an environmentally friendly manner.
            </p>

            <p class="text-justify mb-8">
                Emphasizing environmentally friendly waste disposal methods helps reduce pollution, conserve resources,
                and
                minimize the negative impact on the environment. We are committed to maintaining a clean and sustainable
                ecosystem.
            </p>

            <p class="text-justify">
                At BIN-IT The Smart Move, we're proud to contribute to creating a cleaner and healthier environment. Our
                approach to waste management showcases our dedication to responsible waste disposal and active
                participation
                in safeguarding the planet.
            </p>
        </div>
    </section>


    <x-custom.footer/>
</x-guest-layout>>
