<!-- resources/views/components/sections/contact.blade.php -->
<div id="contact" class="contact content">
    <!-- <div class="contact-title">Contact Us</div> -->
    <h2 class="contact-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-6 max-w-full overflow-hidden whitespace-normal">Contact Us</h2>
    <div class="contact-content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST"
              class="contact-form bg-transparent shadow-md rounded-lg p-6">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required
                          class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"></textarea>
            </div>
            <button type="submit"
                    class="submit-button bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Send Message
            </button>
        </form>
    </div>
</div>