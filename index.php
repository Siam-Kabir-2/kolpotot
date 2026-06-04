<?php
declare(strict_types=1);

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$status = $_GET['status'] ?? '';
$message = $_GET['message'] ?? '';

$statusTitle = '';
$statusType = '';
$statusIcon = '';

if ($status === 'success') {
    $statusTitle = 'Application submitted';
    $statusType = 'success';
    $statusIcon = 'check-circle-2';
    $message = $message !== '' ? $message : 'Your membership request has been received.';
} elseif ($status === 'error') {
    $statusTitle = 'Submission needs attention';
    $statusType = 'error';
    $statusIcon = 'alert-circle';
    $message = $message !== '' ? $message : 'Please review the form and try again.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolpopot | KUET Artists' Society</title>
    <meta name="description"
        content="Kolpopot is the premier art society of KUET, fostering a community of visionaries, painters, and digital artists.">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
    <?php if ($statusType !== ''): ?>
        <div class="status-wrap">
            <div class="container">
                <div class="status-banner status-banner--<?= esc($statusType) ?>" role="status" aria-live="polite">
                    <i data-lucide="<?= esc($statusIcon) ?>"></i>
                    <div>
                        <strong><?= esc($statusTitle) ?></strong>
                        <p><?= esc((string) $message) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <nav class="topbar" id="topbar">
        <div class="container nav-content">
            <a href="#" class="brand">
                <div class="brand-mark">K</div>
                <span>Kolpopot</span>
            </a>
            <div class="nav-links" id="nav-links">
                <a href="#about">About</a>
                <a href="#work">Showcase</a>
                <a href="#about">Foundation</a>
                <a href="#contact">Join Us</a>
            </div>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu">
                <i data-lucide="menu"></i>
            </button>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-copy">
                    <div class="eyebrow">
                        <i data-lucide="sparkles" style="width: 14px; height: 14px;"></i>
                        KUET Artists' Society
                    </div>
                    <h1 class="text-gradient">Where Art Meets <br> Engineering.</h1>
                    <p class="hero-text">The premier art identity of KUET, fostering a community of visionaries,
                        painters, and digital artists who redefine the boundaries of creativity.</p>
                    <div class="hero-actions">
                        <a href="#work" class="button button-primary">
                            Explore Gallery
                            <i data-lucide="arrow-right" style="width: 18px;"></i>
                        </a>
                        <a href="#join-form" class="button button-secondary">Join Society</a>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-value">500+</span>
                            <span class="stat-label">Artworks</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">20+</span>
                            <span class="stat-label">Exhibitions</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">1k+</span>
                            <span class="stat-label">Members</span>
                        </div>
                    </div>
                </div>
                <div class="hero-visual">
                    <img src="hero_art.png" alt="Artistic Composition">
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="section">
            <div class="container">
                <div class="foundation-grid">
                    <div class="foundation-content">
                        <div class="section-header">
                            <span class="section-kicker">Our Philosophy</span>
                            <h2>Fostering the Creative Spirit</h2>
                            <p style="font-size: 1.1rem; color: var(--muted-foreground); margin-top: 24px;">Founded on
                                the belief that creativity is as essential as technical prowess, Kolpopot provides a
                                sanctuary for artists within the rigorous environment of engineering.</p>
                        </div>

                        <div class="feature-list">
                            <div class="feature-item">
                                <i data-lucide="palette"></i>
                                <h4>Diverse Mediums</h4>
                                <p style="font-size: 0.9rem; color: var(--muted-foreground);">From oil painting to
                                    digital sculpting.</p>
                            </div>
                            <div class="feature-item">
                                <i data-lucide="users"></i>
                                <h4>Community</h4>
                                <p style="font-size: 0.9rem; color: var(--muted-foreground);">A supportive network of
                                    fellow artists.</p>
                            </div>
                        </div>
                    </div>
                    <div class="foundation-img">
                        <img src="foundation_1.png" alt="Artists Working">
                    </div>
                </div>
            </div>
        </section>

        <section id="work" class="section section-surface">
            <div class="container">
                <div class="section-header">
                    <span class="section-kicker">Showcase</span>
                    <h2>The Featured Gallery</h2>
                </div>
                <div class="gallery-grid">
                    <article class="gallery-card glass-card">
                        <div class="card-img">
                            <img src="gallery_1.png" alt="Acrylic Painting">
                            <div class="card-overlay">
                                <span class="card-tag">Exhibitions</span>
                                <h3>Beyond the Palette</h3>
                                <p>Our flagship annual exhibition showcasing the finest student art pieces.</p>
                            </div>
                        </div>
                    </article>
                    <article class="gallery-card glass-card">
                        <div class="card-img">
                            <img src="gallery_2.png" alt="Digital Illustration">
                            <div class="card-overlay">
                                <span class="card-tag">Competitions</span>
                                <h3>Brush Harmony</h3>
                                <p>Fostering healthy competition and creativity through live sessions.</p>
                            </div>
                        </div>
                    </article>
                    <article class="gallery-card glass-card">
                        <div class="card-img">
                            <img src="gallery_3.png" alt="Sketching">
                            <div class="card-overlay">
                                <span class="card-tag">Archive</span>
                                <h3>Cultural Legacy</h3>
                                <p>Preserving the artistic history of KUET through curated collections.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact" class="section">
            <div class="container">
                <div class="contact-card glass-card">
                    <div class="section-header section-header--centered">
                        <span class="section-kicker">Get Involved</span>
                        <h2>Let's Create Something <br> Extraordinary</h2>
                        <p>Whether you are an established artist or just starting your creative journey, there is a
                            place for you in Kolpopot.</p>
                    </div>

                    <div class="contact-actions">
                        <a href="mailto:kolpopotkuet@gmail.com" class="button button-primary">
                            <i data-lucide="mail"></i>
                            Send an Email
                        </a>
                        <a href="#join-form" class="button button-secondary">
                            <i data-lucide="file-text"></i>
                            Open Membership Form
                        </a>
                    </div>

                    <div class="membership-layout" id="join-form">
                        <form class="membership-form" action="submit-membership.php" method="post">
                            <div class="form-grid">
                                <label class="form-field">
                                    <span>Full Name *</span>
                                    <input type="text" name="full_name" maxlength="120" required autocomplete="name"
                                        placeholder="Enter your full name">
                                </label>
                                <label class="form-field">
                                    <span>Email Address *</span>
                                    <input type="email" name="email" maxlength="180" required autocomplete="email"
                                        placeholder="you@example.com">
                                </label>
                                <label class="form-field">
                                    <span>Phone Number *</span>
                                    <input type="tel" name="phone" maxlength="30" required autocomplete="tel"
                                        placeholder="01XXXXXXXXX">
                                </label>
                                <label class="form-field">
                                    <span>Department *</span>
                                    <input type="text" name="department" maxlength="100" required
                                        autocomplete="organization" placeholder="CSE, EEE, ME, etc.">
                                </label>
                                <label class="form-field">
                                    <span>Primary Medium *</span>
                                    <select name="art_medium" required>
                                        <option value="">Select your medium</option>
                                        <option>Sketching</option>
                                        <option>Painting</option>
                                        <option>Digital Art</option>
                                        <option>Photography</option>
                                        <option>Mixed Media</option>
                                        <option>Other</option>
                                    </select>
                                </label>
                                <label class="form-field">
                                    <span>Experience Level *</span>
                                    <select name="experience_level" required>
                                        <option value="">Select your experience</option>
                                        <option>Beginner</option>
                                        <option>Intermediate</option>
                                        <option>Advanced</option>
                                    </select>
                                </label>
                                <label class="form-field form-field--full">
                                    <span>Portfolio Link</span>
                                    <input type="url" name="portfolio_url" maxlength="255"
                                        placeholder="https://example.com/portfolio">
                                </label>
                                <label class="form-field form-field--full">
                                    <span>Why do you want to join? *</span>
                                    <textarea name="motivation" rows="5" maxlength="1000" required
                                        placeholder="Tell us about your creative interests and what you want to contribute."></textarea>
                                </label>
                            </div>

                            <label class="checkbox-field">
                                <input type="checkbox" name="consent" value="1" required>
                                <span>I confirm that the information I provided is accurate.</span>
                            </label>

                            <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off"
                                aria-hidden="true">

                            <div class="form-actions">
                                <button type="submit" class="button button-primary">Submit Membership Request</button>
                                <p class="form-note">Applications are stored in MySQL and can be reviewed by the
                                    committee later.</p>
                            </div>
                        </form>

                        <aside class="membership-sidebar glass-card">
                            <span class="section-kicker">What happens next</span>
                            <h3>Built for a clean review flow</h3>
                            <ul>
                                <li>Each submission is validated in PHP before anything touches the database.</li>
                                <li>Data is saved with prepared statements in a dedicated MySQL table.</li>
                                <li>Successful submissions return a clear confirmation message here.</li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="brand">
                        <div class="brand-mark">K</div>
                        <span>Kolpopot</span>
                    </a>
                    <p class="footer-text">The official artists' society of KUET. Bridging the gap between logic and
                        imagination since 20XX.</p>
                </div>
                <div class="footer-links">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#work">Showcase</a></li>
                        <li><a href="#about">Foundation</a></li>
                        <li><a href="#contact">Join Us</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Connect</h4>
                    <div class="social-links">
                        <a href="https://facebook.com/kolpopot" class="social-btn" aria-label="Facebook">
                            <i data-lucide="facebook"></i>
                        </a>
                        <a href="#" class="social-btn" aria-label="Instagram">
                            <i data-lucide="instagram"></i>
                        </a>
                        <a href="#" class="social-btn" aria-label="Twitter">
                            <i data-lucide="twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Kolpopot KUET. All rights reserved.</p>
                <p>Designed with passion at KUET.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>