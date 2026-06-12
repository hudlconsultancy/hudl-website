<?php
/**
 * The HUDL homepage landing sections (hero → CTA).
 * A faithful port of the original static index.html body.
 *
 * @package HUDL_Consultancy
 */

$hudl_email = antispambot( 'contact@hudl.gg' );
?>

<!-- ===== HERO ===== -->
<section id="hero" aria-label="<?php esc_attr_e( 'Hero section', 'hudl-consultancy' ); ?>">
	<div class="hero-bg" aria-hidden="true"></div>
	<div class="hero-stripes-right" aria-hidden="true">
		<div class="vstripe y"></div>
		<div class="vstripe b"></div>
		<div class="vstripe r"></div>
		<div class="vstripe c"></div>
	</div>
	<div class="container">
		<div class="hero-content">
			<div class="hero-left">
				<p class="hero-eyebrow reveal"><?php esc_html_e( 'MARKETING CONSULTANCY — SINCE 2020', 'hudl-consultancy' ); ?></p>
				<h1 class="hero-headline reveal reveal-delay-1">
					LET'S <span class="hero-hudl"><?php echo hudl_wordmark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><br>
					TOGETHER<br>
					AND GROW.
				</h1>
				<p class="hero-sub reveal reveal-delay-2">
					<?php esc_html_e( 'Strategic clarity, creative insight, measurable results. HUDL aligns your marketing with commercial goals — sharpening your brand, optimising performance, and driving sustainable growth.', 'hudl-consultancy' ); ?>
				</p>
				<div class="hero-actions reveal reveal-delay-3">
					<a href="#cta" class="btn-primary">
						<?php esc_html_e( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ); ?>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</a>
					<a href="#services" class="btn-secondary"><?php esc_html_e( 'Our Services', 'hudl-consultancy' ); ?></a>
				</div>
			</div>
			<div class="hero-right reveal reveal-delay-2">
				<div class="hero-stat-grid">
					<div class="stat-card y">
						<div class="stat-num yellow">25+</div>
						<div class="stat-label"><?php esc_html_e( 'Years combined experience', 'hudl-consultancy' ); ?></div>
					</div>
					<div class="stat-card b">
						<div class="stat-num blue">6</div>
						<div class="stat-label"><?php esc_html_e( 'Specialist service areas', 'hudl-consultancy' ); ?></div>
					</div>
					<div class="stat-card r">
						<div class="stat-num red">2020</div>
						<div class="stat-label"><?php esc_html_e( 'Founded in London, UK', 'hudl-consultancy' ); ?></div>
					</div>
					<div class="stat-card c">
						<div class="stat-num cyan">10+</div>
						<div class="stat-label"><?php esc_html_e( 'Sectors served', 'hudl-consultancy' ); ?></div>
					</div>
				</div>
				<blockquote class="hero-quote">
					<?php esc_html_e( "We don't just advise — we take ownership. If we don't believe it'll work, we won't recommend it.", 'hudl-consultancy' ); ?>
					<cite><?php esc_html_e( '— Craig Wood · Founder · HUDL Consultancy', 'hudl-consultancy' ); ?></cite>
				</blockquote>
			</div>
		</div>
	</div>
</section>

<!-- ===== PAIN POINTS ===== -->
<section id="pain" aria-label="<?php esc_attr_e( 'Are you in need of a marketing consultancy', 'hudl-consultancy' ); ?>">
	<div class="container">
		<div class="pain-banner reveal">
			<div class="pain-banner-left">
				<h2>ARE YOU IN NEED OF A<br><span style="font-style:italic;">MAR-KU-TING</span><br>KUHN-SULT-TNT?</h2>
				<p class="pain-sub"><?php esc_html_e( "Most businesses know they need better marketing. Very few know where to start. That's exactly what HUDL is for.", 'hudl-consultancy' ); ?></p>
			</div>
			<div class="pain-banner-right">
				<div class="dict-card-label"><?php esc_html_e( 'Marketing Consultancy', 'hudl-consultancy' ); ?></div>
				<div class="dict-phonetic-title">/'MAR-KU-TING KUHN-SUHL-TN-SEE'/</div>
				<div class="dict-phonetic">/ mar · ku · ting · kuhn · sult · n · see /</div>
				<div class="dict-noun"><?php esc_html_e( 'NOUN  ·  Marketing Consultant', 'hudl-consultancy' ); ?></div>
				<div class="dict-def"><?php esc_html_e( "A person or company that gives expert advice on advertising and selling a company or person's products or services in the best possible way.", 'hudl-consultancy' ); ?></div>
				<div class="dict-callout">
					<p><strong>HUDL</strong> <?php esc_html_e( 'can help you gain a fresh perspective, unlock insights, sharpen your marketing campaigns, refine your brand and drive performance.', 'hudl-consultancy' ); ?></p>
				</div>
			</div>
		</div>
		<div class="pain-bridge reveal" style="padding: 48px 0 32px; text-align: center;">
			<span class="tag"><?php esc_html_e( 'Sound familiar?', 'hudl-consultancy' ); ?></span>
			<h2 style="font-family: var(--font-display); font-size: clamp(32px, 4vw, 56px); line-height: 0.95; letter-spacing: 1px; color: var(--white);">IF YOUR BUSINESS HAS<br>REACHED A POINT WHERE<span style="color: var(--yellow);">...</span></h2>
		</div>
		<div class="pain-grid reveal reveal-delay-1">
			<div class="pain-card">
				<div class="pain-check-num ny">01</div>
				<div class="pain-check-text"><?php esc_html_e( "Campaigns don't work like they used to", 'hudl-consultancy' ); ?></div>
			</div>
			<div class="pain-card">
				<div class="pain-check-num nb">02</div>
				<div class="pain-check-text"><?php esc_html_e( 'Sales is driving marketing — not the other way around', 'hudl-consultancy' ); ?></div>
			</div>
			<div class="pain-card">
				<div class="pain-check-num nr">03</div>
				<div class="pain-check-text"><?php esc_html_e( 'Your marketing efforts feel shallow or inconsistent', 'hudl-consultancy' ); ?></div>
			</div>
			<div class="pain-card">
				<div class="pain-check-num nc">04</div>
				<div class="pain-check-text"><?php esc_html_e( 'You have no visibility on what your marketing is actually delivering', 'hudl-consultancy' ); ?></div>
			</div>
			<div class="pain-card">
				<div class="pain-check-num ny">05</div>
				<div class="pain-check-text"><?php esc_html_e( 'Meaningful growth is becoming difficult to achieve', 'hudl-consultancy' ); ?></div>
			</div>
			<div class="pain-card">
				<div class="pain-check-num nb">06</div>
				<div class="pain-check-text"><?php esc_html_e( 'Sales are shrinking while marketing spend is growing', 'hudl-consultancy' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- ===== SERVICES ===== -->
<section id="services" aria-label="<?php esc_attr_e( 'Our marketing services', 'hudl-consultancy' ); ?>">
	<div class="container">
		<header class="section-header reveal">
			<span class="tag"><?php esc_html_e( 'What We Do', 'hudl-consultancy' ); ?></span>
			<h2>CONSULTANCY<br><span class="blue"><?php esc_html_e( 'WE PROVIDE', 'hudl-consultancy' ); ?></span></h2>
			<p><?php esc_html_e( 'From foundational strategy to full-funnel performance, HUDL covers every marketing discipline your business needs to grow.', 'hudl-consultancy' ); ?></p>
		</header>
		<div class="services-grid">
			<article class="service-card y reveal">
				<div class="service-num" aria-hidden="true">01</div>
				<div class="service-icon" aria-hidden="true">★</div>
				<h3 class="service-title"><?php esc_html_e( 'Marketing Strategy', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'Growth frameworks, brand positioning, revenue modelling, and campaign architecture that aligns your marketing with commercial outcomes.', 'hudl-consultancy' ); ?></p>
			</article>
			<article class="service-card b reveal reveal-delay-1">
				<div class="service-num" aria-hidden="true">02</div>
				<div class="service-icon" aria-hidden="true">◎</div>
				<h3 class="service-title"><?php esc_html_e( 'Paid Media', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'Rebuilt campaign structures, advanced bidding strategies, and optimised spend allocation across Google Ads, Meta, and beyond.', 'hudl-consultancy' ); ?></p>
			</article>
			<article class="service-card r reveal reveal-delay-2">
				<div class="service-num" aria-hidden="true">03</div>
				<div class="service-icon" aria-hidden="true">⬆</div>
				<h3 class="service-title"><?php esc_html_e( 'SEO & Content', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'Content audits, content pillars, structured data, and organic performance strategies built to last.', 'hudl-consultancy' ); ?></p>
			</article>
			<article class="service-card c reveal reveal-delay-3">
				<div class="service-num" aria-hidden="true">04</div>
				<div class="service-icon" aria-hidden="true">⬡</div>
				<h3 class="service-title"><?php esc_html_e( 'Social Media', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'Audience engagement, community management, and social strategies that build brand authority and convert followers into customers.', 'hudl-consultancy' ); ?></p>
			</article>
			<article class="service-card b reveal">
				<div class="service-num" aria-hidden="true">05</div>
				<div class="service-icon" aria-hidden="true">✉</div>
				<h3 class="service-title"><?php esc_html_e( 'Email Marketing', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'Automated sequences, nurture journeys, and high-converting campaigns that keep your audience engaged and coming back.', 'hudl-consultancy' ); ?></p>
			</article>
			<article class="service-card y reveal reveal-delay-1">
				<div class="service-num" aria-hidden="true">06</div>
				<div class="service-icon" aria-hidden="true">◈</div>
				<h3 class="service-title"><?php esc_html_e( 'Data & Analytics', 'hudl-consultancy' ); ?></h3>
				<p class="service-desc"><?php esc_html_e( 'GA4 implementation, Tag Manager, CRM integration, ROI models, and reporting dashboards aligned to real revenue outcomes.', 'hudl-consultancy' ); ?></p>
			</article>
		</div>
	</div>
</section>

<!-- ===== PROCESS ===== -->
<section id="process" aria-label="<?php esc_attr_e( 'How HUDL works', 'hudl-consultancy' ); ?>">
	<div class="container">
		<header class="section-header reveal">
			<span class="tag"><?php esc_html_e( 'How We Work', 'hudl-consultancy' ); ?></span>
			<h2>HUDL IN AND LET'S<br><span class="red"><?php esc_html_e( 'GET STARTED', 'hudl-consultancy' ); ?></span></h2>
			<p><?php esc_html_e( 'Three clear steps from first conversation to measurable growth.', 'hudl-consultancy' ); ?></p>
		</header>
		<div class="process-steps">
			<div class="step reveal">
				<div class="step-num" aria-hidden="true">01</div>
				<p class="step-tag yellow"><?php esc_html_e( 'Free Consultation', 'hudl-consultancy' ); ?></p>
				<h3 class="step-title"><?php esc_html_e( 'Understand Your Business', 'hudl-consultancy' ); ?></h3>
				<p class="step-desc"><?php esc_html_e( 'We start with a free consultation to understand your business, your goals, and your current position in the marketplace. No pressure, no jargon — just clarity.', 'hudl-consultancy' ); ?></p>
			</div>
			<div class="step reveal reveal-delay-1">
				<div class="step-num" aria-hidden="true">02</div>
				<p class="step-tag blue"><?php esc_html_e( 'Assessment', 'hudl-consultancy' ); ?></p>
				<h3 class="step-title"><?php esc_html_e( 'Audit & Align', 'hudl-consultancy' ); ?></h3>
				<p class="step-desc"><?php esc_html_e( 'We provide a simple assessment to help direct your thinking, collate key metrics and information, and identify the biggest growth opportunities available to you.', 'hudl-consultancy' ); ?></p>
			</div>
			<div class="step reveal reveal-delay-2">
				<div class="step-num" aria-hidden="true">03</div>
				<p class="step-tag cyan"><?php esc_html_e( 'Execution', 'hudl-consultancy' ); ?></p>
				<h3 class="step-title"><?php esc_html_e( 'Strategy & Growth', 'hudl-consultancy' ); ?></h3>
				<p class="step-desc"><?php esc_html_e( 'We define your marketing strategy, manage resources, and refine your activity — integrating seamlessly with your existing team to deliver measurable, commercial results.', 'hudl-consultancy' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- ===== ABOUT ===== -->
<section id="about" aria-label="<?php esc_attr_e( 'About HUDL Consultancy', 'hudl-consultancy' ); ?>">
	<div class="container">
		<div class="about-grid">
			<div class="about-left reveal">
				<span class="tag"><?php esc_html_e( 'About HUDL', 'hudl-consultancy' ); ?></span>
				<h2>OUR <span class="hero-hudl"><?php echo hudl_wordmark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span> IS DIFFERENT</h2>
				<p><?php esc_html_e( 'Since 2020, HUDL has been delivering marketing solutions across a variety of industries. We got our start in digital gaming and entertainment — our expertise now spans FMCG, Film & Entertainment, Removals & Logistics, Retail, Real Estate, Construction, and more.', 'hudl-consultancy' ); ?></p>
				<p><?php esc_html_e( 'Our team brings over 25 years of combined marketing and communication experience. This varied background has given us tried-and-tested methodologies that work across different business types, sharpening our creative thinking and deepening our commercial understanding.', 'hudl-consultancy' ); ?></p>
				<p><?php esc_html_e( 'HUDL operates at the intersection of strategy, performance, and operations — ensuring every marketing recommendation is both insightful and actionable, driven by your data and our experience.', 'hudl-consultancy' ); ?></p>
				<a href="#cta" class="btn-primary" style="margin-top: 24px;">
					<?php esc_html_e( 'Join Our HUDL', 'hudl-consultancy' ); ?>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</a>
			</div>
			<div class="about-right reveal reveal-delay-1">
				<span class="tag" style="margin-bottom: 24px; display:block;"><?php esc_html_e( 'Core Capabilities', 'hudl-consultancy' ); ?></span>
				<ul class="capability-list" role="list">
					<li class="cap-item cy"><span class="cap-name"><?php esc_html_e( 'Strategic Marketing', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cb"><span class="cap-name"><?php esc_html_e( 'Paid Media & CRO', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cr"><span class="cap-name"><?php esc_html_e( 'SEO & Content Strategy', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cc"><span class="cap-name"><?php esc_html_e( 'Website UX & Conversion', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cy"><span class="cap-name"><?php esc_html_e( 'Lead Tracking & Attribution', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cb"><span class="cap-name"><?php esc_html_e( 'Data, Reporting & Forecasting', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cr"><span class="cap-name"><?php esc_html_e( 'Brand Positioning', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
					<li class="cap-item cc"><span class="cap-name"><?php esc_html_e( 'Commercial Enablement', 'hudl-consultancy' ); ?></span><span class="cap-dot" aria-hidden="true"></span></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- ===== CLIENTS ===== -->
<section id="clients" aria-label="<?php esc_attr_e( 'Our clients past and present', 'hudl-consultancy' ); ?>">
	<div class="container">
		<p class="clients-label reveal"><?php esc_html_e( 'Trusted By — Past & Present Clients', 'hudl-consultancy' ); ?></p>
		<div class="clients-grid reveal reveal-delay-1">
			<?php
			$hudl_clients = array(
				array( 'A', 'Abels Moving Services', 'var(--yellow)' ),
				array( 'BM', "Bishop's Move", 'var(--blue)' ),
				array( 'GR', 'Gerson Relocation', 'var(--red)' ),
				array( 'GMS', 'Gerson Moving Services', 'var(--cyan)' ),
				array( 'AF', 'Anglo French Removals', 'var(--yellow)' ),
				array( 'CT', 'CAPS Training', 'var(--blue)' ),
				array( 'HI', 'HIGH Beverages', 'var(--red)' ),
				array( 'MT', 'Moba Trainer', 'var(--cyan)' ),
				array( 'EFW', 'Esports Fashion Week', 'var(--yellow)' ),
				array( 'AC', 'Acer', 'var(--blue)' ),
				array( 'YZ', 'YaizY', 'var(--red)' ),
				array( 'UN', 'Unified', 'var(--cyan)' ),
				array( 'TD', 'Tundra', 'var(--yellow)' ),
				array( 'UP', 'Challengers Uprising', 'var(--red)' ),
				array( 'SS', 'Source Sense', 'var(--cyan)' ),
			);
			foreach ( $hudl_clients as $client ) :
				?>
				<div class="client-pill">
					<div class="client-logo-placeholder" style="background:<?php echo esc_attr( $client[2] ); ?>"><?php echo esc_html( $client[0] ); ?></div>
					<span class="client-pill-name"><?php echo esc_html( $client[1] ); ?></span>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>
</section>

<!-- ===== TEAM ===== -->
<section id="team" aria-label="<?php esc_attr_e( 'Meet our founders', 'hudl-consultancy' ); ?>">
	<div class="container">
		<header class="section-header reveal">
			<span class="tag"><?php esc_html_e( 'Our Founders', 'hudl-consultancy' ); ?></span>
			<h2>MEET OUR <span class="cyan"><?php esc_html_e( 'FOUNDERS', 'hudl-consultancy' ); ?></span></h2>
			<p><?php esc_html_e( 'Over 25 years of combined experience across FMCG, Gaming, Entertainment, Retail, Real Estate and beyond.', 'hudl-consultancy' ); ?></p>
		</header>
		<div class="team-grid">
			<article class="founder-card reveal">
				<div class="founder-img"><div class="founder-img-placeholder"><span class="founder-initials">CW</span></div></div>
				<div class="founder-info">
					<p class="founder-role"><?php esc_html_e( 'Co-Founder & Managing Director', 'hudl-consultancy' ); ?></p>
					<h3 class="founder-name"><?php esc_html_e( 'Craig Wood', 'hudl-consultancy' ); ?></h3>
					<p class="founder-bio"><?php esc_html_e( 'Craig brings deep expertise in marketing strategy, commercial growth, and performance media. He has led multi-brand transformations, rebuilt campaign structures from the ground up, and built ROI frameworks aligned to real revenue outcomes across a wide range of sectors.', 'hudl-consultancy' ); ?></p>
				</div>
			</article>
			<article class="founder-card reveal reveal-delay-1">
				<div class="founder-img"><div class="founder-img-placeholder"><span class="founder-initials">ML</span></div></div>
				<div class="founder-info">
					<p class="founder-role"><?php esc_html_e( 'Co-Founder, Creative & Strategy Director', 'hudl-consultancy' ); ?></p>
					<h3 class="founder-name"><?php esc_html_e( 'Michele Le Tissier', 'hudl-consultancy' ); ?></h3>
					<p class="founder-bio"><?php esc_html_e( "Michele leads HUDL's creative and strategic output — developing brand narratives, content direction, and messaging frameworks that resonate. Her background spans Film & Entertainment, FMCG, and digital-first brands, bringing a unique blend of creative and commercial thinking.", 'hudl-consultancy' ); ?></p>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- ===== CTA ===== -->
<section id="cta" aria-label="<?php esc_attr_e( 'Book a free consultation', 'hudl-consultancy' ); ?>">
	<div class="container">
		<div class="cta-inner reveal">
			<span class="tag"><?php esc_html_e( "What's Your Goal?", 'hudl-consultancy' ); ?></span>
			<h2>LET'S <span class="hero-hudl"><?php echo hudl_wordmark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></h2>
			<p><?php esc_html_e( "Fill in your details and we'll be in contact shortly to book your free marketing consultation.", 'hudl-consultancy' ); ?></p>
			<form class="cta-form" name="consultation" method="POST" action="<?php echo esc_url( home_url( '/thank-you/' ) ); ?>">
				<input type="hidden" name="form-name" value="consultation" />
				<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your email address', 'hudl-consultancy' ); ?>" aria-label="<?php esc_attr_e( 'Email address', 'hudl-consultancy' ); ?>" required />
				<select name="service" aria-label="<?php esc_attr_e( 'Select a service', 'hudl-consultancy' ); ?>" required>
					<option value="" disabled selected><?php esc_html_e( 'Select a service', 'hudl-consultancy' ); ?></option>
					<option value="Marketing Strategy"><?php esc_html_e( 'Marketing Strategy', 'hudl-consultancy' ); ?></option>
					<option value="Paid Media"><?php esc_html_e( 'Paid Media', 'hudl-consultancy' ); ?></option>
					<option value="SEO & Content"><?php esc_html_e( 'SEO & Content', 'hudl-consultancy' ); ?></option>
					<option value="Social Media"><?php esc_html_e( 'Social Media', 'hudl-consultancy' ); ?></option>
					<option value="Email Marketing"><?php esc_html_e( 'Email Marketing', 'hudl-consultancy' ); ?></option>
					<option value="Data & Analytics"><?php esc_html_e( 'Data & Analytics', 'hudl-consultancy' ); ?></option>
					<option value="Not Sure"><?php esc_html_e( "Not Sure — Let's Talk", 'hudl-consultancy' ); ?></option>
				</select>
				<button type="submit" class="btn-primary cta-form-btn"><?php esc_html_e( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ); ?></button>
			</form>
			<p style="margin-top: 16px; font-size: 13px; color: var(--muted);">
				<?php esc_html_e( 'Or email us at', 'hudl-consultancy' ); ?>
				<a href="mailto:<?php echo esc_attr( $hudl_email ); ?>" style="color: var(--yellow);"><?php echo esc_html( $hudl_email ); ?></a>
			</p>
		</div>
	</div>
</section>
