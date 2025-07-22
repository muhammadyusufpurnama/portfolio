<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yusuf's Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <nav>
            <a data-tab="intro">Intro</a>
            <a data-tab="experience">EXP</a>
            <a data-tab="skill">Skill</a>
            <a data-tab="project">Project</a>
            <a data-tab="contact">Contact</a>
        </nav>
    </header>

    {{-- Bagian INTRO --}}
    <div class="tab" id="intro">
        <div class="container">
            <div class="avatar">
                <img src="{{ asset($intro['avatar']) }}"> {{-- Data avatar dari controller --}}
            </div>
            <div class="content">
                <div class="name">{{ $intro['name'] }}</div> {{-- Data nama dari controller --}}
                <div class="job">
                    I'm a <span class="text-gradient">
                        {{ $intro['job_title'] }} {{-- Data job title dari controller --}}
                    </span>
                </div>
                <div class="des">
                    {{ $intro['description'] }} {{-- Data deskripsi intro dari controller --}}
                    <br>
                    <a class="text-gradient" data-tab="skill">See my Skills</a>
                </div>
                <i class="fa-solid fa-quote-right" style="width: 5%"></i>
            </div>
        </div>
    </div>

    {{-- Bagian EXPERIENCE --}}
    <div class="tab" id="experience">
        <div class="container">
            <div class="list">
                @forelse ($experiences as $exp)
                    {{-- Loop data experience dari controller --}}
                    <div class="item">
                        <div class="time">{{ $exp['year'] }}</div>
                        <i class="{{ $exp['icon'] }}"></i> {{-- Class icon dari data controller --}}
                        <div class="content">
                            <div class="job">{{ $exp['job'] }}</div>
                            <div class="company">{{ $exp['company'] }}</div>
                            <div class="des">
                                {{ $exp['description'] }}
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No experience data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Bagian SKILL --}}
    <div class="tab" id="skill">
        <div class="container">
            <div class="list">
                @forelse ($skills as $skill)
                    {{-- Loop data skill dari controller --}}
                    <div class="item">
                        <i class="{{ $skill['icon'] }}"></i> {{-- Class icon dari data controller --}}
                        <div class="name">{{ $skill['name'] }}</div>
                        <div class="des">
                            {{ $skill['description'] }}
                        </div>
                        <a class="text-gradient" data-tab="project">See Project</a>
                    </div>
                @empty
                    <p>No skill data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Bagian PROJECT --}}
    <div class="tab" id="project">
        <div class="container">
            <div class="list">
                @forelse ($projects as $project)
                    <div class="item">
                        <img class="project-image" data-images="{{ json_encode($project['images']) }}"
                            src="{{ asset($project['images'][0]) }}">
                        <div class="index">#{{ $project['id'] }}</div>
                        <div class="name">{{ $project['name'] }}</div>
                        <div class="des">
                            {{ $project['description'] }}
                        </div>
                        <div class="author">
                            <div class="job">{{ $project['job'] }}</div>
                            <div class="time">
                                <small><small>{{ $project['time'] }}</small>
                                    <i class="fa-regular fa-clock"></i></small>
                            </div>
                        </div>
                        <a href="{{ $project['link'] }}" target="_blank"
                            class="text-blue-500 hover:underline font-semibold"
                            style="padding-left: 3%; margin-bottom: 2%">See More About Project
                            &rarr;</a>
                    </div>
                @empty
                    <p>No project data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Bagian CONTACT --}}
    <div class="tab" id="contact">
        <div class="container">
            <div class="content">
                <div class="thank text-gradient">Thank you!</div>
                <div class="des">
                    This portfolio is intended to help me communicate the results of the projects
                    I have worked on. I hope that this portfolio will be taken into consideration
                    by the HRD for my internship program.
                    <br>
                    <a class="text-gradient" data-tab="intro">See My Intro</a>
                </div>
                <div class="list">
                    <div class="item">
                        <i class="fa-solid fa-phone"></i>
                        {{ $contact['phone'] }} {{-- Data telepon dari controller --}}
                    </div>

                    <div class="item">
                        <i class="fa-regular fa-envelope"></i>
                        {{ $contact['email'] }} {{-- Data email dari controller --}}
                    </div>

                    <div class="item">
                        <i class="fa-brands fa-instagram"></i>
                        {{ $contact['instagram'] }} {{-- Data Instagram dari controller --}}
                    </div>
                </div>

                {{-- --- START: BAGIAN FEEDBACK BARU --- --}}
                <h3 class="feedback-heading">Leave a Feedback</h3>

                <form id="feedbackForm" class="feedback-form">
                    @csrf {{-- Penting untuk keamanan Laravel (CSRF Token) --}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="feedback-name" name="name" required>
                        <div class="error-message" id="name-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (Optional):</label>
                        <input type="email" id="feedback-email" name="email">
                        <div class="error-message" id="email-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="feedback-message" name="message" rows="5" required></textarea>
                        <div class="error-message" id="message-error"></div>
                    </div>
                    <button type="submit" class="submit-feedback-btn">Submit Feedback</button>
                </form>

                <div class="feedback-messages-container">
                    <h3 class="feedback-heading">All Feedbacks</h3>
                    <div id="feedbacksList" class="feedbacks-list">
                        {{-- Feedback akan dimuat di sini oleh JavaScript --}}
                        <p class="loading-feedback-message">Loading feedbacks...</p>
                        @forelse ($feedbacks as $feedback)
                            <div class="feedback-item" data-id="{{ $feedback->id }}">
                                <div class="feedback-header">
                                    <span class="feedback-name">{{ $feedback->name }}</span>
                                    <span
                                        class="feedback-date">{{ $feedback->created_at->format('M d, Y H:i') }}</span>
                                </div>
                                @if ($feedback->email)
                                    <p class="feedback-email">{{ $feedback->email }}</p>
                                @endif
                                <p class="feedback-message">{{ $feedback->message }}</p>
                                <div class="feedback-actions">
                                    <button class="edit-feedback-btn" data-id="{{ $feedback->id }}">Edit</button>
                                    <button class="delete-feedback-btn" data-id="{{ $feedback->id }}">Delete</button>
                                </div>
                            </div>
                        @empty
                            <p class="no-feedback-message">No feedbacks yet. Be the first to leave one!</p>
                        @endforelse
                    </div>
                </div>
                {{-- --- END: BAGIAN FEEDBACK BARU --- --}}

            </div> {{-- Akhir dari div class="content" --}}
        </div> {{-- Akhir dari div class="container" --}}
    </div> {{-- Akhir dari div class="tab" id="contact" --}}

    <script src="{{ asset('js/app.js') }}"></script> {{-- Link ke JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const projectImages = document.querySelectorAll('.project-image');

            projectImages.forEach(img => {
                const images = JSON.parse(img.getAttribute('data-images'));
                let index = 0;

                setInterval(() => {
                    // Tambahkan class fade-out dulu
                    img.classList.remove('fade-in');
                    img.classList.add('fade-out');

                    // Setelah animasi keluar selesai (500ms), ganti gambar dan animasi masuk
                    setTimeout(() => {
                        index = (index + 1) % images.length;
                        img.src = images[index];

                        img.classList.remove('fade-out');
                        img.classList.add('fade-in');
                    }, 500);
                }, 4000); // Ganti setiap 3 detik
            });
        });
    </script>

</body>

</html>
