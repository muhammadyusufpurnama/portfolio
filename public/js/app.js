document.addEventListener('DOMContentLoaded', function() {
    // === BAGIAN 1: LOGIKA PERPINDAHAN TAB ===

    // Variabel yang sudah ada dari kode Anda (biarkan saja, tidak merusak)
    let intro = document.getElementById('intro');
    let experience = document.getElementById('experience');
    let skill = document.getElementById('skill');
    let project = document.getElementById('project');
    let contact = document.getElementById('contact');

    // --- PENTING: MENGGANTI CARA MEMILIH LINK NAVIGASI ---
    // Sekarang pilih SEMUA elemen yang memiliki atribut 'data-tab'
    const allTabTriggerLinks = document.querySelectorAll('[data-tab]');
    // Hapus atau abaikan const navLinks dan const seeSkillsLink sebelumnya,
    // karena allTabTriggerLinks akan mencakup semuanya.

    let activeTabId = 'intro'; // Mengganti 'active' menjadi 'activeTabId' agar lebih deskriptif
    let currentZIndex = 2; // Mengganti 'zIndex' menjadi 'currentZIndex'

    // Fungsi untuk menampilkan tab dan menerapkan efek transisi
    function showTab(tabId, clickedElement = null) {
        if (tabId === null || tabId === activeTabId) {
            return;
        }

        const activeOld = document.querySelector('.tab.active');
        if (activeOld) {
            activeOld.classList.remove('active');
        }

        activeTabId = tabId; // Perbarui tab aktif
        const tabActive = document.getElementById(activeTabId);

        currentZIndex++; // Tingkatkan z-index
        tabActive.style.zIndex = currentZIndex;

        // Atur --x dan --y untuk efek lingkaran, jika ada elemen yang diklik
        if (clickedElement) {
            const rect = clickedElement.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            tabActive.style.setProperty('--x', `${centerX}px`);
            tabActive.style.setProperty('--y', `${centerY}px`);
        } else {
            // Untuk pemuatan awal atau jika tidak ada clickedElement,
            // atur titik tengah layar sebagai default untuk efek lingkaran
            tabActive.style.setProperty('--x', '50%');
            tabActive.style.setProperty('--y', '50%');
        }

        tabActive.classList.add('active'); // Tambahkan kelas 'active'
    }

    // --- PENTING: SATU EVENT LISTENER UNTUK SEMUA LINK DATA-TAB ---
    allTabTriggerLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default link (penting!)
            const tabId = this.dataset.tab;
            showTab(tabId, this); // Panggil fungsi showTab
        });
    });
    // --- AKHIR PENGGANTIAN EVENT LISTENER ---

    // Inisialisasi: Tampilkan tab 'intro' secara default saat halaman dimuat
    // atau jika ada hash di URL (misal: domain.com/#skill)
    const initialTabFromHash = window.location.hash ? window.location.hash.substring(1) : 'intro';
    // Gunakan allTabTriggerLinks untuk menemukan elemen yang diklik untuk inisialisasi
    showTab(initialTabFromHash, document.querySelector(`[data-tab="${initialTabFromHash}"]`) || null);


    // === BAGIAN 2: FUNGSI AUTO-SLIDE UNTUK SLIDER GAMBAR PROJECT ===
    // (Kode ini tidak saya sentuh karena Anda tidak jadi pakai,
    //  tapi tetap ada di file jika Anda berubah pikiran di masa depan.
    //  Jika elemen HTMLnya tidak ada, bagian ini tidak akan aktif.)

    const projectSliders = document.querySelectorAll('.project-image-slider');

    projectSliders.forEach(slider => {
        const sliderImagesContainer = slider.querySelector('.slider-images');
        const images = slider.querySelectorAll('.slider-image');
        const prevButton = slider.querySelector('.prev-slide');
        const nextButton = slider.querySelector('.next-slide');
        const dotsContainer = slider.querySelector('.slider-dots');
        const dots = slider.querySelectorAll('.dot');

        let currentIndex = 0;
        const totalImages = images.length;
        let autoSlideInterval;
        const slideDuration = 5000; // 5 seconds

        function showSlide(index) {
            if (index >= totalImages) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalImages - 1;
            } else {
                currentIndex = index;
            }
            sliderImagesContainer.style.transform = `translateX(${-currentIndex * 100}%)`;

            if (dots.length > 0) {
                dots.forEach(dot => dot.classList.remove('active'));
                if (dots[currentIndex]) {
                    dots[currentIndex].classList.add('active');
                }
            }
        }

        function startAutoSlide() {
            stopAutoSlide();
            if (totalImages > 1) {
                autoSlideInterval = setInterval(() => {
                    showSlide(currentIndex + 1);
                }, slideDuration);
            }
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(currentIndex - 1);
                startAutoSlide();
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(currentIndex + 1);
                startAutoSlide();
            });
        }

        if (dotsContainer && dots.length > 0) {
            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    stopAutoSlide();
                    const slideIndex = parseInt(this.dataset.slideIndex);
                    showSlide(slideIndex);
                    startAutoSlide();
                });
            });
        }

        if (totalImages > 0) {
            showSlide(0);
            startAutoSlide();
        }
    });


    // === BAGIAN 3: LOGIKA FEEDBACK (FORM & CRUD AJAX) ===

    const feedbackForm = document.getElementById('feedbackForm');
    const feedbacksList = document.getElementById('feedbacksList');
    const loadingMessage = feedbacksList ? feedbacksList.querySelector('.loading-feedback-message') : null;
    const noFeedbackMessage = feedbacksList ? feedbacksList.querySelector('.no-feedback-message') : null;

    function displayErrors(errors, formElement) {
        formElement.querySelectorAll('.error-message').forEach(el => el.textContent = '');
        for (const field in errors) {
            const errorElement = formElement.querySelector(`#${field}-error`) || formElement.querySelector(`[id^="edit-${field}-"][id$="-error"]`);
            if (errorElement) {
                errorElement.textContent = errors[field][0];
            }
        }
    }

    function clearForm() {
        if (feedbackForm) {
            feedbackForm.reset();
            feedbackForm.querySelectorAll('.error-message').forEach(el => el.textContent = '');
        }
    }

    function createFeedbackElement(feedback) {
        const feedbackItem = document.createElement('div');
        feedbackItem.classList.add('feedback-item');
        feedbackItem.setAttribute('data-id', feedback.id);

        feedbackItem.innerHTML = `
            <div class="feedback-header">
                <span class="feedback-name">${escapeHtml(feedback.name)}</span>
                <span class="feedback-date">${new Date(feedback.created_at).toLocaleString('en-US', { month: 'short', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</span>
            </div>
            ${feedback.email ? `<p class="feedback-email">${escapeHtml(feedback.email)}</p>` : ''}
            <p class="feedback-message">${escapeHtml(feedback.message)}</p>
            <div class="feedback-actions">
                <button class="edit-feedback-btn" data-id="${feedback.id}">Edit</button>
                <button class="delete-feedback-btn" data-id="${feedback.id}">Delete</button>
            </div>
        `;
        return feedbackItem;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.appendChild(document.createTextNode(text));
        return div.innerHTML;
    }

    async function loadFeedbacks() {
        if (!feedbacksList) return;

        if (loadingMessage) loadingMessage.style.display = 'block';
        if (noFeedbackMessage) noFeedbackMessage.style.display = 'none';
        feedbacksList.innerHTML = '';

        try {
            const response = await fetch('/feedbacks');
            const data = await response.json();

            if (loadingMessage) loadingMessage.style.display = 'none';

            if (data.length === 0) {
                if (noFeedbackMessage) noFeedbackMessage.style.display = 'block';
            } else {
                data.forEach(feedback => {
                    feedbacksList.prepend(createFeedbackElement(feedback));
                });
            }
        } catch (error) {
            console.error('Error loading feedbacks:', error);
            if (loadingMessage) loadingMessage.textContent = 'Failed to load feedbacks.';
        }
    }

    if (feedbackForm) {
        feedbackForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Submitting...';

            try {
                const response = await fetch('/feedbacks', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    alert(data.message);
                    clearForm();
                    if (noFeedbackMessage) noFeedbackMessage.style.display = 'none';
                    feedbacksList.prepend(createFeedbackElement(data.feedback));
                } else if (response.status === 422) {
                    displayErrors(data.errors, feedbackForm);
                } else {
                    alert('Error: ' + (data.message || 'Something went wrong.'));
                }
            } catch (error) {
                console.error('Error submitting feedback:', error);
                alert('An unexpected error occurred.');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = 'Submit Feedback';
            }
        });
    }

    if (feedbacksList) {
        feedbacksList.addEventListener('click', async function(e) {
            if (e.target.classList.contains('delete-feedback-btn')) {
                if (!confirm('Are you sure you want to delete this feedback?')) {
                    return;
                }

                const feedbackId = e.target.dataset.id;
                const feedbackItem = e.target.closest('.feedback-item');

                try {
                    const response = await fetch(`/feedbacks/${feedbackId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        alert(data.message);
                        feedbackItem.remove();
                        if (feedbacksList.children.length === 0) {
                            if (noFeedbackMessage) noFeedbackMessage.style.display = 'block';
                        }
                    } else {
                        alert('Error deleting feedback: ' + (data.message || 'Something went wrong.'));
                    }
                } catch (error) {
                    console.error('Error deleting feedback:', error);
                    alert('An unexpected error occurred during deletion.');
                }
            }

            if (e.target.classList.contains('edit-feedback-btn')) {
                const feedbackId = e.target.dataset.id;
                const feedbackItem = e.target.closest('.feedback-item');
                const currentName = feedbackItem.querySelector('.feedback-name').textContent;
                const currentEmail = feedbackItem.querySelector('.feedback-email') ? feedbackItem.querySelector('.feedback-email').textContent : '';
                const currentMessage = feedbackItem.querySelector('.feedback-message').textContent;

                feedbackItem.innerHTML = `
                    <form class="edit-feedback-form" data-id="${feedbackId}">
                        <div class="form-group">
                            <label for="edit-name-${feedbackId}">Name:</label>
                            <input type="text" id="edit-name-${feedbackId}" name="name" value="${escapeHtml(currentName)}" required>
                            <div class="error-message" id="edit-name-${feedbackId}-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="edit-email-${feedbackId}">Email (Optional):</label>
                            <input type="email" id="edit-email-${feedbackId}" name="email" value="${escapeHtml(currentEmail)}">
                            <div class="error-message" id="edit-email-${feedbackId}-error"></div>
                        </div>
                        <div class="form-group">
                            <label for="edit-message-${feedbackId}">Message:</label>
                            <textarea id="edit-message-${feedbackId}" name="message" rows="5" required>${escapeHtml(currentMessage)}</textarea>
                            <div class="error-message" id="edit-message-${feedbackId}-error"></div>
                        </div>
                        <div class="feedback-actions">
                            <button type="submit" class="save-feedback-btn">Save</button>
                            <button type="button" class="cancel-edit-btn" data-id="${feedbackId}">Cancel</button>
                        </div>
                    </form>
                `;
            }

            if (e.target.classList.contains('save-feedback-btn')) {
                e.preventDefault();
                const editForm = e.target.closest('.edit-feedback-form');
                const feedbackId = editForm.dataset.id;
                const formData = new FormData(editForm);
                formData.append('_method', 'PUT');

                const saveButton = editForm.querySelector('.save-feedback-btn');
                saveButton.disabled = true;
                saveButton.textContent = 'Saving...';

                try {
                    const response = await fetch(`/feedbacks/${feedbackId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (response.ok) {
                        alert(data.message);
                        const updatedFeedbackItem = createFeedbackElement(data.feedback);
                        editForm.replaceWith(updatedFeedbackItem);
                    } else if (response.status === 422) {
                        displayErrors(data.errors, editForm);
                    } else {
                        alert('Error updating feedback: ' + (data.message || 'Something went wrong.'));
                    }
                } catch (error) {
                    console.error('Error updating feedback:', error);
                    alert('An unexpected error occurred during update.');
                } finally {
                    saveButton.disabled = false;
                    saveButton.textContent = 'Save';
                }
            }

            if (e.target.classList.contains('cancel-edit-btn')) {
                const feedbackId = e.target.dataset.id;
                const feedbackItem = e.target.closest('.feedback-item');
                loadFeedbacks();
            }
        });
    }

}); // Akhir dari DOMContentLoaded
