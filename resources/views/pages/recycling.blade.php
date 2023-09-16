<x-guest-layout>
    <x-custom.nav/>
    <header class="bg-green-500 py-24 ">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl text-white font-semibold">Recycling Matters</h1>
            <p class="text-lg text-white mt-2">A Sustainable Approach to Waste Management</p>
        </div>
    </header>
    <main class="container mx-auto mt-8 px-4">
        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4">Why Recycling Is Important</h2>
            <p class="text-gray-700 leading-relaxed">
                Recycling plays a crucial role in reducing the environmental impact of waste. It conserves natural
                resources, reduces energy consumption, and decreases pollution. Recycling helps us move towards a
                sustainable future where we minimize waste and make the most of our resources.
            </p>
        </section>
        <section class="bg-white p-8 mt-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4">Recycling Tips</h2>
            <ul class="list-disc pl-6">
                <li class="text-gray-700">Sort your recyclables properly into bins designated for different materials.
                </li>
                <li class="text-gray-700">Reduce waste by opting for reusable items over single-use products.</li>
                <li class="text-gray-700">Support recycling programs in your community by participating actively.</li>
                <li class="text-gray-700">Educate yourself and others about the importance of recycling.</li>
            </ul>
        </section>
        <section class="bg-white p-8 mt-8 rounded-lg shadow-lg my-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                <x-custom.iframe src="https://www.youtube.com/embed/s2xrarUWVRQ?si=GZNNe6CIk4Iv4oIA"/>
                <x-custom.image src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"/>
                <x-custom.image src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"/>
            </div>
        </section>
    </main>

    <x-custom.footer/>
</x-guest-layout>
