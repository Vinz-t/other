<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ONE FOPH - Web Systems Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #f093fb;
            --dark: #0a0a1a;
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--dark);
            color: #fff;
            min-height: 100vh;
            max-height: 100vh;
        }

        /* Background Image Layer */
        .bg-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -3;
            background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&q=80');
            background-size: cover;
            background-position: center;
        }

        /* Dark Overlay */
        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: linear-gradient(135deg, rgba(10, 10, 26, 0.92) 0%, rgba(20, 10, 40, 0.88) 50%, rgba(10, 10, 26, 0.92) 100%);
        }

        /* Animated Gradient Overlay */
        .bg-gradient-animated {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(102, 126, 234, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(118, 75, 162, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(240, 147, 251, 0.08) 0%, transparent 60%);
            animation: gradientMove 15s ease infinite;
        }

        @keyframes gradientMove {
            0%, 100% { 
                background-position: 0% 0%, 100% 100%, 50% 50%;
                opacity: 0.8;
            }
            50% { 
                background-position: 100% 0%, 0% 100%, 50% 50%;
                opacity: 1;
            }
        }

        /* ==================== ENHANCED PRELOADER ==================== */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--dark);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            overflow: hidden;
        }

        .preloader.fade-out {
            animation: preloaderFadeOut 0.8s ease forwards;
        }

        @keyframes preloaderFadeOut {
            0% { opacity: 1; }
            100% { 
                opacity: 0; 
                visibility: hidden;
                pointer-events: none;
            }
        }

        /* Preloader Background Effects */
        .preloader-bg {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .preloader-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: orbFloat 8s ease-in-out infinite;
        }

        .preloader-orb:nth-child(1) {
            width: 400px;
            height: 400px;
            background: rgba(102, 126, 234, 0.3);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .preloader-orb:nth-child(2) {
            width: 300px;
            height: 300px;
            background: rgba(118, 75, 162, 0.3);
            bottom: -80px;
            right: -80px;
            animation-delay: -2s;
        }

        .preloader-orb:nth-child(3) {
            width: 250px;
            height: 250px;
            background: rgba(240, 147, 251, 0.2);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -4s;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(30px, -30px) scale(1.1); }
            50% { transform: translate(-20px, 20px) scale(0.9); }
            75% { transform: translate(20px, 10px) scale(1.05); }
        }

        /* Loader Container */
        .loader-container {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: clamp(20px, 4vh, 40px);
        }

        /* Logo Animation */
        .loader-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            opacity: 0;
            animation: logoReveal 1s ease 0.3s forwards;
        }

        @keyframes logoReveal {
            0% { 
                opacity: 0; 
                transform: translateY(30px) scale(0.8);
            }
            100% { 
                opacity: 1; 
                transform: translateY(0) scale(1);
            }
        }

        .loader-logo-icon {
            width: clamp(50px, 8vw, 70px);
            height: clamp(50px, 8vw, 70px);
            background: var(--primary-gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(1.5rem, 4vw, 2rem);
            position: relative;
            animation: iconPulse 2s ease infinite;
            box-shadow: 0 0 40px rgba(102, 126, 234, 0.5);
        }

        @keyframes iconPulse {
            0%, 100% { 
                box-shadow: 0 0 40px rgba(102, 126, 234, 0.5);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 60px rgba(240, 147, 251, 0.7);
                transform: scale(1.05);
            }
        }

        .loader-logo-icon::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary), var(--accent), var(--secondary));
            background-size: 300% 300%;
            animation: borderRotate 3s linear infinite;
            z-index: -1;
        }

        @keyframes borderRotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ONE FOPH Text */
        .loader-brand {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .loader-brand-text {
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 800;
            letter-spacing: 2px;
            display: flex;
            gap: 2px;
        }

        .loader-brand-text span {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #667eea);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            transform: translateY(20px) rotateX(-90deg);
            animation: textGradient 4s ease infinite, letterReveal 0.5s ease forwards;
        }

        .loader-brand-text span:nth-child(1) { animation-delay: 0.5s, 0.5s; }
        .loader-brand-text span:nth-child(2) { animation-delay: 0.5s, 0.6s; }
        .loader-brand-text span:nth-child(3) { animation-delay: 0.5s, 0.7s; }
        .loader-brand-text span:nth-child(4) { animation-delay: 0.5s, 0.8s; min-width: 15px; }
        .loader-brand-text span:nth-child(5) { animation-delay: 0.5s, 0.9s; }
        .loader-brand-text span:nth-child(6) { animation-delay: 0.5s, 1.0s; }
        .loader-brand-text span:nth-child(7) { animation-delay: 0.5s, 1.1s; }
        .loader-brand-text span:nth-child(8) { animation-delay: 0.5s, 1.2s; }

        @keyframes letterReveal {
            0% { 
                opacity: 0; 
                transform: translateY(20px) rotateX(-90deg);
            }
            100% { 
                opacity: 1; 
                transform: translateY(0) rotateX(0);
            }
        }

        @keyframes textGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .loader-tagline {
            font-size: clamp(0.6rem, 1.5vw, 0.85rem);
            color: rgba(255,255,255,0.5);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 5px;
            opacity: 0;
            animation: taglineReveal 0.8s ease 1.5s forwards;
        }

        @keyframes taglineReveal {
            0% { 
                opacity: 0; 
                transform: translateX(-20px);
            }
            100% { 
                opacity: 1; 
                transform: translateX(0);
            }
        }

        /* Spinner Animation */
        .loader-spinner {
            position: relative;
            width: clamp(50px, 8vw, 80px);
            height: clamp(50px, 8vw, 80px);
            opacity: 0;
            animation: spinnerReveal 0.5s ease 0.8s forwards;
        }

        @keyframes spinnerReveal {
            0% { opacity: 0; transform: scale(0.5); }
            100% { opacity: 1; transform: scale(1); }
        }

        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-radius: 50%;
            animation: spinnerRotate 1.5s linear infinite;
        }

        .spinner-ring:nth-child(1) {
            border-top-color: var(--primary);
            border-right-color: var(--primary);
        }

        .spinner-ring:nth-child(2) {
            width: 70%;
            height: 70%;
            top: 15%;
            left: 15%;
            border-bottom-color: var(--accent);
            border-left-color: var(--accent);
            animation-duration: 1s;
            animation-direction: reverse;
        }

        .spinner-ring:nth-child(3) {
            width: 40%;
            height: 40%;
            top: 30%;
            left: 30%;
            border-top-color: var(--secondary);
            animation-duration: 0.7s;
        }

        @keyframes spinnerRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .spinner-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            background: var(--primary-gradient);
            border-radius: 50%;
            animation: centerPulse 1s ease infinite;
        }

        @keyframes centerPulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); box-shadow: 0 0 10px var(--primary); }
            50% { transform: translate(-50%, -50%) scale(1.3); box-shadow: 0 0 20px var(--accent); }
        }

        /* Progress Bar */
        .loader-progress {
            width: min(250px, 80vw);
            opacity: 0;
            animation: progressReveal 0.5s ease 1.2s forwards;
        }

        @keyframes progressReveal {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .progress-bar-container {
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.1);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-fill {
            height: 100%;
            width: 0%;
            background: var(--primary-gradient);
            border-radius: 2px;
            transition: width 0.3s ease;
            position: relative;
        }

        .progress-bar-fill::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 30px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5));
            animation: progressShine 1s ease infinite;
        }

        @keyframes progressShine {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        .progress-text {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: clamp(0.65rem, 1.5vw, 0.75rem);
            color: rgba(255,255,255,0.5);
        }

        .progress-percent {
            color: var(--primary);
            font-weight: 600;
        }

        /* Loading Tips */
        .loader-tips {
            position: absolute;
            bottom: clamp(20px, 5vh, 60px);
            text-align: center;
            opacity: 0;
            animation: tipsReveal 0.5s ease 2s forwards;
        }

        @keyframes tipsReveal {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .tip-text {
            font-size: clamp(0.7rem, 1.5vw, 0.85rem);
            color: rgba(255,255,255,0.4);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tip-text i {
            color: var(--primary);
        }

        /* Preloader Particles */
        .preloader-particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .preloader-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0;
            animation: preloaderParticle 3s ease-in-out infinite;
        }

        @keyframes preloaderParticle {
            0% { 
                opacity: 0; 
                transform: translateY(100vh) scale(0);
            }
            10% { 
                opacity: 0.8; 
                transform: translateY(80vh) scale(1);
            }
            90% { 
                opacity: 0.8;
            }
            100% { 
                opacity: 0; 
                transform: translateY(-20vh) scale(0);
            }
        }

        /* ==================== END PRELOADER ==================== */

        /* Floating Shapes */
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            filter: blur(40px);
            will-change: transform;
        }

        .floating-shape:nth-child(1) {
            width: 500px;
            height: 500px;
            top: -200px;
            right: -100px;
            animation: shape1Float 25s infinite ease-in-out;
        }

        .floating-shape:nth-child(2) {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -100px;
            animation: shape2Float 30s infinite ease-in-out;
        }

        .floating-shape:nth-child(3) {
            width: 300px;
            height: 300px;
            top: 50%;
            left: 50%;
            animation: shape3Float 20s infinite ease-in-out;
        }

        @keyframes shape1Float {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(-50px, 30px) rotate(90deg) scale(1.1); }
            50% { transform: translate(30px, -40px) rotate(180deg) scale(0.95); }
            75% { transform: translate(-30px, 20px) rotate(270deg) scale(1.05); }
        }

        @keyframes shape2Float {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            33% { transform: translate(40px, -30px) rotate(120deg) scale(1.1); }
            66% { transform: translate(-30px, 40px) rotate(240deg) scale(0.9); }
        }

        @keyframes shape3Float {
            0%, 100% { transform: translate(-50%, -50%) rotate(0deg) scale(1); }
            50% { transform: translate(-45%, -55%) rotate(180deg) scale(1.15); }
        }

        /* Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            will-change: transform, opacity;
        }

        .particle.type-1 {
            width: 3px;
            height: 3px;
            background: var(--primary);
            animation: particleFloat1 20s infinite;
        }

        .particle.type-2 {
            width: 5px;
            height: 5px;
            background: var(--accent);
            animation: particleFloat2 25s infinite;
        }

        .particle.type-3 {
            width: 2px;
            height: 2px;
            background: var(--secondary);
            animation: particleFloat3 15s infinite;
        }

        @keyframes particleFloat1 {
            0% { opacity: 0; transform: translateY(100vh) rotate(0deg); }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { opacity: 0; transform: translateY(-100vh) rotate(360deg); }
        }

        @keyframes particleFloat2 {
            0% { opacity: 0; transform: translateY(100vh) translateX(0) scale(0.5); }
            10% { opacity: 0.5; transform: scale(1); }
            50% { transform: translateY(0) translateX(50px) scale(1.2); }
            90% { opacity: 0.5; }
            100% { opacity: 0; transform: translateY(-100vh) translateX(-50px) scale(0.5); }
        }

        @keyframes particleFloat3 {
            0% { opacity: 0; transform: translateY(100vh); }
            5% { opacity: 0.8; }
            95% { opacity: 0.8; }
            100% { opacity: 0; transform: translateY(-100vh); }
        }

        /* Main Layout - NO SCROLL */
        .main-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            max-height: 100vh;
            position: relative;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s ease;
            overflow: hidden;
        }

        .main-container.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Header */
        .header {
            padding: clamp(8px, 1.5vh, 15px) 0;
            background: rgba(10, 10, 26, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(102, 126, 234, 0.15);
            flex-shrink: 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: clamp(8px, 1vw, 12px);
            font-size: clamp(1rem, 2vw, 1.5rem);
            font-weight: 800;
            text-decoration: none;
            color: white;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: clamp(32px, 5vw, 45px);
            height: clamp(32px, 5vw, 45px);
            background: var(--primary-gradient);
            border-radius: clamp(8px, 1vw, 12px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(1rem, 2vw, 1.5rem);
            animation: pulse-glow 2s infinite;
            position: relative;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logo:hover .logo-icon::before {
            opacity: 1;
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.4); }
            50% { box-shadow: 0 0 35px rgba(240, 147, 251, 0.6); }
        }

        .logo-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-stats {
            display: flex;
            gap: clamp(15px, 3vw, 30px);
        }

        .header-stat {
            text-align: center;
            position: relative;
            padding: 0 clamp(8px, 1.5vw, 15px);
            opacity: 0;
            animation: statReveal 0.5s ease forwards;
        }

        .header-stat:nth-child(1) { animation-delay: 0.1s; }
        .header-stat:nth-child(2) { animation-delay: 0.2s; }
        .header-stat:nth-child(3) { animation-delay: 0.3s; }

        @keyframes statReveal {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .header-stat:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 30px;
            width: 1px;
            background: rgba(102, 126, 234, 0.3);
        }

        .header-stat-value {
            font-size: clamp(0.9rem, 1.5vw, 1.25rem);
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .header-stat-value i {
            font-size: clamp(0.8rem, 1.2vw, 1rem);
        }

        .header-stat-value .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #28a745;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }

        .header-stat-label {
            font-size: clamp(0.55rem, 0.8vw, 0.7rem);
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-actions {
            display: flex;
            gap: clamp(5px, 1vw, 10px);
        }

        .btn-icon {
            width: clamp(32px, 4vw, 42px);
            height: clamp(32px, 4vw, 42px);
            border-radius: clamp(8px, 1vw, 12px);
            border: 1px solid rgba(102, 126, 234, 0.3);
            background: rgba(255,255,255,0.05);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: clamp(0.8rem, 1.2vw, 1rem);
        }

        .btn-icon:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            transform: translateY(-2px);
        }

        /* Hero Banner - Compact */
        .hero-banner {
            padding: clamp(10px, 2vh, 25px) 0;
            text-align: center;
            position: relative;
            flex-shrink: 0;
        }

        .hero-badge {
            display: inline-block;
            padding: clamp(4px, 0.8vh, 8px) clamp(12px, 2vw, 20px);
            background: rgba(102, 126, 234, 0.15);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 50px;
            font-size: clamp(0.65rem, 1vw, 0.8rem);
            margin-bottom: clamp(8px, 1vh, 15px);
            animation: fadeInDown 0.8s ease;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .hero-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: badgeShine 3s ease infinite;
        }

        @keyframes badgeShine {
            0% { left: -100%; }
            50%, 100% { left: 100%; }
        }

        .hero-title {
            font-size: clamp(1.3rem, 4vw, 2.5rem);
            font-weight: 800;
            margin-bottom: clamp(5px, 1vh, 10px);
            animation: fadeInUp 0.8s ease 0.1s both;
            text-shadow: 0 2px 20px rgba(0,0,0,0.5);
        }

        .hero-title .gradient-text {
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 4s ease infinite;
            position: relative;
            display: inline-block;
        }

        .hero-title .gradient-text::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 2px;
            transform: scaleX(0);
            animation: underlineReveal 0.8s ease 0.8s forwards;
        }

        @keyframes underlineReveal {
            0% { transform: scaleX(0); }
            100% { transform: scaleX(1); }
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .hero-subtitle {
            color: rgba(255,255,255,0.7);
            font-size: clamp(0.75rem, 1.2vw, 1rem);
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Filter Tabs - Compact */
        .filter-section {
            padding: clamp(8px, 1.5vh, 15px) 0;
            flex-shrink: 0;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: clamp(5px, 1vw, 10px);
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: clamp(6px, 1vh, 10px) clamp(12px, 2vw, 24px);
            border: 1px solid rgba(102, 126, 234, 0.25);
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            color: rgba(255,255,255,0.7);
            border-radius: 50px;
            font-weight: 500;
            font-size: clamp(0.7rem, 1vw, 0.9rem);
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: filterTabReveal 0.5s ease forwards;
        }

        .filter-tab:nth-child(1) { animation-delay: 0.1s; }
        .filter-tab:nth-child(2) { animation-delay: 0.15s; }
        .filter-tab:nth-child(3) { animation-delay: 0.2s; }
        .filter-tab:nth-child(4) { animation-delay: 0.25s; }
        .filter-tab:nth-child(5) { animation-delay: 0.3s; }

        @keyframes filterTabReveal {
            0% { opacity: 0; transform: translateY(15px) scale(0.9); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .filter-tab::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .filter-tab:hover, .filter-tab.active {
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .filter-tab:hover::before, .filter-tab.active::before {
            opacity: 1;
        }

        .filter-tab .count {
            background: rgba(255,255,255,0.2);
            padding: 2px 6px;
            border-radius: 10px;
            font-size: clamp(0.6rem, 0.9vw, 0.75rem);
            margin-left: 6px;
        }

        /* Carousel Section - Fills remaining space */
        .systems-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            padding: clamp(5px, 1vh, 10px) 0;
        }

        .carousel-container {
            position: relative;
            padding: 0 clamp(40px, 6vw, 60px);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .carousel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: clamp(10px, 1.5vh, 20px);
            padding: 0 10px;
            flex-shrink: 0;
        }

        .carousel-title {
            font-size: clamp(0.9rem, 1.5vw, 1.2rem);
            font-weight: 600;
            color: rgba(255,255,255,0.8);
        }

        .carousel-title span {
            color: var(--primary);
        }

        .carousel-nav-top {
            display: flex;
            gap: 8px;
        }

        .carousel-wrapper {
            overflow: hidden;
            flex: 1;
            display: flex;
            align-items: center;
        }

        .carousel-track {
            display: flex;
            gap: clamp(12px, 2vw, 24px);
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 100%;
            align-items: center;
        }

        /* Navigation Arrows */
        .carousel-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: clamp(35px, 5vw, 50px);
            height: clamp(35px, 5vw, 50px);
            border-radius: 50%;
            border: 1px solid rgba(102, 126, 234, 0.3);
            background: rgba(15, 15, 35, 0.8);
            backdrop-filter: blur(10px);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            font-size: clamp(0.9rem, 1.2vw, 1.2rem);
        }

        .carousel-nav-btn:hover:not(:disabled) {
            background: var(--primary-gradient);
            border-color: transparent;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .carousel-nav-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .carousel-nav-btn.prev {
            left: 0;
        }

        .carousel-nav-btn.next {
            right: 0;
        }

        /* Carousel Dots */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: clamp(10px, 1.5vh, 20px);
            flex-shrink: 0;
        }

        .carousel-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(102, 126, 234, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot:hover {
            background: rgba(102, 126, 234, 0.5);
        }

        .carousel-dot.active {
            width: 25px;
            border-radius: 5px;
            background: var(--primary-gradient);
            border-color: transparent;
        }

        /* System Card - Responsive sizing */
        .system-card {
            min-width: clamp(200px, 25vw, 320px);
            max-width: clamp(200px, 25vw, 320px);
            height: clamp(200px, 35vh, 320px);
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(102, 126, 234, 0.15);
            border-radius: clamp(12px, 2vw, 20px);
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            opacity: 0;
            transform: translateY(30px) scale(0.95);
            display: flex;
            flex-direction: column;
        }

        .system-card.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .system-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(102, 126, 234, 0.2) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .system-card:hover::before {
            opacity: 1;
        }

        .system-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.3), rgba(240, 147, 251, 0.3));
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: 0;
        }

        .system-card:hover::after {
            opacity: 0.1;
        }

        .system-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(102, 126, 234, 0.4);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
        }

        .card-image {
            position: relative;
            height: 40%;
            min-height: 80px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .system-card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 15, 35, 1) 0%, rgba(15, 15, 35, 0.5) 50%, transparent 100%);
        }

        .card-badge {
            position: absolute;
            top: clamp(6px, 1vh, 12px);
            right: clamp(6px, 1vw, 12px);
            padding: clamp(3px, 0.5vh, 5px) clamp(8px, 1vw, 12px);
            border-radius: 20px;
            font-size: clamp(0.55rem, 0.8vw, 0.7rem);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
        }

        .badge-active {
            background: rgba(40, 167, 69, 0.9);
            color: white;
        }

        .badge-development {
            background: rgba(255, 193, 7, 0.9);
            color: #000;
        }

        .badge-new {
            background: rgba(102, 126, 234, 0.9);
            color: white;
            animation: newBadgePulse 2s ease infinite;
        }

        @keyframes newBadgePulse {
            0%, 100% { box-shadow: 0 0 10px rgba(102, 126, 234, 0.5); }
            50% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.8); }
        }

        .card-category {
            position: absolute;
            top: clamp(6px, 1vh, 12px);
            left: clamp(6px, 1vw, 12px);
            padding: clamp(3px, 0.5vh, 5px) clamp(8px, 1vw, 12px);
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            font-size: clamp(0.55rem, 0.8vw, 0.7rem);
            color: rgba(255,255,255,0.9);
            z-index: 2;
        }

        .card-content {
            padding: clamp(10px, 1.5vh, 20px);
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 0;
        }

        .card-title {
            font-size: clamp(0.8rem, 1.2vw, 1.1rem);
            font-weight: 700;
            margin-bottom: clamp(4px, 0.5vh, 8px);
            transition: color 0.3s ease;
            line-height: 1.2;
        }

        .system-card:hover .card-title {
            color: var(--primary);
        }

        .card-desc {
            font-size: clamp(0.65rem, 0.9vw, 0.85rem);
            color: rgba(255,255,255,0.6);
            line-height: 1.4;
            margin-bottom: clamp(8px, 1vh, 15px);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: clamp(6px, 1vw, 12px);
        }

        .card-meta-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: clamp(0.6rem, 0.85vw, 0.75rem);
            color: rgba(255,255,255,0.5);
        }

        .card-meta-item i {
            color: var(--primary);
            font-size: clamp(0.65rem, 0.9vw, 0.85rem);
        }

        .card-meta-item.version {
            padding: 2px 6px;
            background: rgba(102, 126, 234, 0.15);
            border-radius: 6px;
            color: var(--primary);
            font-weight: 600;
        }

        .card-meta-item.platform i {
            color: var(--accent);
        }

        .card-btn {
            width: clamp(28px, 4vw, 38px);
            height: clamp(28px, 4vw, 38px);
            border-radius: 50%;
            border: 1px solid rgba(102, 126, 234, 0.3);
            background: rgba(255,255,255,0.05);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: clamp(0.7rem, 1vw, 1rem);
        }

        .card-btn:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            transform: rotate(45deg);
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: clamp(20px, 4vh, 60px) 20px;
            color: rgba(255,255,255,0.5);
            display: none;
        }

        .no-results i {
            font-size: clamp(1.5rem, 4vw, 3rem);
            margin-bottom: 10px;
            color: var(--primary);
        }

        .no-results.show {
            display: block;
        }

        /* Footer - Compact */
        .footer {
            padding: clamp(8px, 1.5vh, 15px) 0;
            background: rgba(10, 10, 26, 0.5);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(102, 126, 234, 0.1);
            text-align: center;
            flex-shrink: 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer-links {
            display: flex;
            gap: clamp(12px, 2vw, 25px);
        }

        .footer-links a {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: clamp(0.65rem, 1vw, 0.85rem);
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-copy {
            color: rgba(255,255,255,0.4);
            font-size: clamp(0.6rem, 0.9vw, 0.8rem);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(15px);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: rgba(18, 18, 42, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.25);
            border-radius: clamp(15px, 2vw, 25px);
            width: 100%;
            max-width: min(600px, 90vw);
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.9) translateY(20px);
            transition: transform 0.4s ease;
            display: flex;
            flex-direction: column;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1) translateY(0);
        }

        .modal-header-img {
            height: clamp(120px, 20vh, 200px);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .modal-header-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-header-img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(18, 18, 42, 1) 0%, transparent 50%);
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: clamp(30px, 4vw, 40px);
            height: clamp(30px, 4vw, 40px);
            border-radius: 50%;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            font-size: clamp(0.8rem, 1.2vw, 1rem);
        }

        .modal-close:hover {
            background: var(--primary);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: clamp(15px, 2vh, 25px) clamp(15px, 3vw, 30px) clamp(20px, 3vh, 30px);
            overflow-y: auto;
            flex: 1;
        }

        .modal-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: clamp(10px, 1.5vh, 15px);
            flex-wrap: wrap;
        }

        .modal-badge {
            display: inline-block;
            padding: clamp(4px, 0.5vh, 6px) clamp(10px, 1.5vw, 15px);
            border-radius: 20px;
            font-size: clamp(0.6rem, 0.9vw, 0.75rem);
            font-weight: 600;
        }

        .modal-version {
            padding: clamp(4px, 0.5vh, 6px) clamp(8px, 1vw, 12px);
            background: rgba(102, 126, 234, 0.15);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 20px;
            font-size: clamp(0.6rem, 0.9vw, 0.75rem);
            color: var(--primary);
            font-weight: 600;
        }

        .modal-platform {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: clamp(4px, 0.5vh, 6px) clamp(8px, 1vw, 12px);
            background: rgba(240, 147, 251, 0.1);
            border: 1px solid rgba(240, 147, 251, 0.2);
            border-radius: 20px;
            font-size: clamp(0.6rem, 0.9vw, 0.75rem);
            color: var(--accent);
        }

        .modal-title {
            font-size: clamp(1.1rem, 2vw, 1.5rem);
            font-weight: 700;
            margin-bottom: clamp(6px, 1vh, 10px);
        }

        .modal-desc {
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
            margin-bottom: clamp(15px, 2vh, 25px);
            font-size: clamp(0.75rem, 1vw, 0.9rem);
        }

        .modal-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: clamp(8px, 1.5vw, 15px);
            margin-bottom: clamp(15px, 2vh, 25px);
        }

        .modal-info-item {
            text-align: center;
            padding: clamp(10px, 1.5vh, 15px);
            background: rgba(102, 126, 234, 0.08);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 12px;
        }

        .modal-info-item i {
            font-size: clamp(1rem, 1.5vw, 1.5rem);
            color: var(--primary);
            margin-bottom: 6px;
        }

        .modal-info-item .value {
            font-size: clamp(0.7rem, 1vw, 0.9rem);
            font-weight: 600;
            color: white;
            margin-bottom: 2px;
        }

        .modal-info-item .label {
            font-size: clamp(0.55rem, 0.8vw, 0.7rem);
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal-features {
            margin-bottom: clamp(15px, 2vh, 25px);
        }

        .modal-features h6 {
            font-size: clamp(0.7rem, 1vw, 0.85rem);
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: clamp(10px, 1.5vh, 15px);
        }

        .feature-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(6px, 1vh, 10px);
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: clamp(6px, 1vh, 10px) clamp(10px, 1.5vw, 15px);
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 10px;
            font-size: clamp(0.65rem, 0.9vw, 0.85rem);
        }

        .feature-item i {
            color: var(--primary);
            font-size: clamp(0.7rem, 1vw, 0.9rem);
        }

        .modal-actions {
            display: flex;
            gap: clamp(10px, 1.5vw, 15px);
        }

        .btn-primary-glow {
            flex: 1;
            padding: clamp(10px, 1.5vh, 14px) clamp(15px, 2vw, 25px);
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: clamp(0.75rem, 1vw, 0.9rem);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary-outline {
            padding: clamp(10px, 1.5vh, 14px) clamp(15px, 2vw, 25px);
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: clamp(0.75rem, 1vw, 0.9rem);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary-outline:hover {
            background: rgba(102, 126, 234, 0.15);
            border-color: var(--primary);
        }

        /* Scrollbar - hide */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        /* Responsive - Very Small Screens */
        @media (max-width: 768px) {
            .header-stats {
                display: none;
            }

            .carousel-nav-btn {
                width: 35px;
                height: 35px;
            }

            .carousel-container {
                padding: 0 45px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }

            .carousel-header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .loader-logo {
                flex-direction: column;
                text-align: center;
            }

            .loader-brand {
                align-items: center;
            }

            .modal-info-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .feature-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .carousel-container {
                padding: 0 12px;
            }

            .carousel-nav-btn {
                display: none;
            }

            .filter-tabs {
                padding: 0 10px;
                overflow-x: auto;
                flex-wrap: nowrap;
                justify-content: flex-start;
                -webkit-overflow-scrolling: touch;
            }

            .filter-tabs::-webkit-scrollbar {
                display: none;
            }

            .filter-tab {
                flex-shrink: 0;
            }

            .hero-badge {
                display: none;
            }

            .modal-info-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 6px;
            }
        }

        /* Landscape mode on small screens */
        @media (max-height: 500px) {
            .hero-banner {
                padding: 5px 0;
            }

            .hero-badge {
                display: none;
            }

            .hero-subtitle {
                display: none;
            }

            .filter-section {
                padding: 5px 0;
            }

            .carousel-dots {
                display: none;
            }

            .footer {
                padding: 5px 0;
            }

            .footer-links {
                display: none;
            }
        }

        /* Mouse Trail Effect */
        .mouse-trail {
            position: fixed;
            width: 20px;
            height: 20px;
            border: 2px solid var(--primary);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.1s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .mouse-trail.active {
            opacity: 0.5;
        }

        .mouse-dot {
            position: fixed;
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mouse-dot.active {
            opacity: 1;
        }

        /* Hide mouse effects on touch devices */
        @media (hover: none) {
            .mouse-trail,
            .mouse-dot {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Mouse Trail Effect -->
    <div class="mouse-trail" id="mouseTrail"></div>
    <div class="mouse-dot" id="mouseDot"></div>

    <!-- Background Image -->
    <div class="bg-image" id="bgImage"></div>
    
    <!-- Dark Overlay -->
    <div class="bg-overlay"></div>
    
    <!-- Animated Gradient Overlay -->
    <div class="bg-gradient-animated"></div>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape" id="shape1"></div>
        <div class="floating-shape" id="shape2"></div>
        <div class="floating-shape" id="shape3"></div>
    </div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- Enhanced Preloader -->
    <div class="preloader" id="preloader">
        <!-- Preloader Background -->
        <div class="preloader-bg">
            <div class="preloader-orb"></div>
            <div class="preloader-orb"></div>
            <div class="preloader-orb"></div>
        </div>

        <!-- Preloader Particles -->
        <div class="preloader-particles" id="preloaderParticles"></div>

        <!-- Loader Content -->
        <div class="loader-container">
            <!-- Logo -->
            <div class="loader-logo">
                <div class="loader-logo-icon">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
                <div class="loader-brand">
                    <div class="loader-brand-text">
                        <span>O</span><span>N</span><span>E</span><span class="space">&nbsp;</span><span>F</span><span>O</span><span>P</span><span>H</span>
                    </div>
                    <div class="loader-tagline">Unified Platform Solutions</div>
                </div>
            </div>

            <!-- Spinner -->
            <div class="loader-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-center"></div>
            </div>

            <!-- Progress Bar -->
            <div class="loader-progress">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" id="progressFill"></div>
                </div>
                <div class="progress-text">
                    <span>Loading systems...</span>
                    <span class="progress-percent" id="progressPercent">0%</span>
                </div>
            </div>
        </div>

        <!-- Loading Tips -->
        <div class="loader-tips">
            <div class="tip-text">
                <i class="bi bi-lightbulb"></i>
                <span id="loadingTip">Preparing your dashboard experience</span>
            </div>
        </div>
    </div>

    <div class="main-container" id="mainContainer">
        <!-- Header -->
        <header class="header" id="header">
            <div class="container">
                <div class="header-content">
                    <a href="#" class="logo">
                        <div class="logo-icon">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </div>
                        <span class="logo-text">ONE FOPH</span>
                    </a>

                    <div class="header-stats">
                        <div class="header-stat">
                            <div class="header-stat-value">
                                <i class="bi bi-grid-3x3"></i> 12
                            </div>
                            <div class="header-stat-label">Systems</div>
                        </div>
                        <div class="header-stat">
                            <div class="header-stat-value">
                                <i class="bi bi-folder2"></i> 4
                            </div>
                            <div class="header-stat-label">Categories</div>
                        </div>
                        <div class="header-stat">
                            <div class="header-stat-value">
                                <span class="status-dot"></span> Online
                            </div>
                            <div class="header-stat-label">Status</div>
                        </div>
                    </div>

                    <div class="header-actions">
                        <button class="btn-icon" title="Search">
                            <i class="bi bi-search"></i>
                        </button>
                        <button class="btn-icon" title="Notifications">
                            <i class="bi bi-bell"></i>
                        </button>
                        <button class="btn-icon" title="Settings">
                            <i class="bi bi-gear"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Banner -->
        <section class="hero-banner" id="heroBanner">
            <div class="container">
                <div class="hero-badge">
                    <i class="bi bi-lightning-charge-fill me-1"></i> Unified Platform
                </div>
                <h1 class="hero-title">
                    Welcome to <span class="gradient-text">ONE FOPH</span>
                </h1>
                <p class="hero-subtitle">Access all your integrated web systems in one place</p>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="filter-section">
            <div class="container">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">
                        All Systems <span class="count">12</span>
                    </button>
                    <button class="filter-tab" data-filter="hr">
                        <i class="bi bi-people me-1"></i> HR & Admin <span class="count">3</span>
                    </button>
                    <button class="filter-tab" data-filter="finance">
                        <i class="bi bi-cash-stack me-1"></i> Finance <span class="count">2</span>
                    </button>
                    <button class="filter-tab" data-filter="operations">
                        <i class="bi bi-gear me-1"></i> Operations <span class="count">5</span>
                    </button>
                    <button class="filter-tab" data-filter="analytics">
                        <i class="bi bi-graph-up me-1"></i> Analytics <span class="count">2</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Systems Carousel -->
        <section class="systems-section">
            <div class="container" style="height: 100%; display: flex; flex-direction: column;">
                <div class="carousel-container">
                    <div class="carousel-header">
                        <h3 class="carousel-title">
                            <i class="bi bi-collection me-2"></i>
                            Showing <span id="visibleCount">12</span> Systems
                        </h3>
                        <div class="carousel-nav-top">
                            <button class="btn-icon" id="prevBtnTop" title="Previous">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="btn-icon" id="nextBtnTop" title="Next">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button class="carousel-nav-btn prev" id="prevBtn">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="carousel-nav-btn next" id="nextBtn">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="carousel-wrapper">
                        <div class="carousel-track" id="carouselTrack">
                            <!-- System Card 1 -->
                            <div class="system-card" data-category="hr" data-system="hrms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=400&h=300&fit=crop" alt="HR Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Human Resource Management</h3>
                                    <p class="card-desc">Complete HR solution for employee management, attendance tracking, and performance evaluation.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.5</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 2 -->
                            <div class="system-card" data-category="finance" data-system="fms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop" alt="Financial Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Finance</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Financial Management System</h3>
                                    <p class="card-desc">Streamlined financial operations including budgeting, expense tracking, and reporting.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v3.1</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 3 -->
                            <div class="system-card" data-category="operations" data-system="ims">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?w=400&h=300&fit=crop" alt="Inventory Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Inventory Management</h3>
                                    <p class="card-desc">Real-time inventory tracking, stock management, and automated reorder notifications.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.8</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-phone"></i> Mobile
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 4 -->
                            <div class="system-card" data-category="operations" data-system="pms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=400&h=300&fit=crop" alt="Project Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-new">New</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Project Management</h3>
                                    <p class="card-desc">Collaborative project planning, task assignment, and progress monitoring tools.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.0</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 5 -->
                            <div class="system-card" data-category="hr" data-system="attendance">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=400&h=300&fit=crop" alt="Attendance Tracking">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Attendance & Time Tracking</h3>
                                    <p class="card-desc">Automated attendance recording, shift management, and overtime calculation.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.2</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-phone"></i> Mobile
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 6 -->
                            <div class="system-card" data-category="analytics" data-system="bi">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop" alt="Business Intelligence">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Analytics</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Business Intelligence</h3>
                                    <p class="card-desc">Comprehensive analytics and reporting with interactive visualizations.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v4.0</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 7 -->
                            <div class="system-card" data-category="operations" data-system="dms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1568667256549-094345857637?w=400&h=300&fit=crop" alt="Document Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Document Management</h3>
                                    <p class="card-desc">Centralized document storage, version control, and secure file sharing.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.0</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 8 -->
                            <div class="system-card" data-category="finance" data-system="procurement">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=300&fit=crop" alt="Procurement">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-development">In Dev</span>
                                    <span class="card-category">Finance</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Procurement System</h3>
                                    <p class="card-desc">End-to-end procurement workflow from requisition to purchase order.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v0.9</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 9 -->
                            <div class="system-card" data-category="hr" data-system="lms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=300&fit=crop" alt="Training & Learning">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-new">New</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Training & Learning</h3>
                                    <p class="card-desc">Online training platform with course management and certification.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.0</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 10 -->
                            <div class="system-card" data-category="operations" data-system="helpdesk">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop" alt="Helpdesk">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Helpdesk & Ticketing</h3>
                                    <p class="card-desc">IT support ticketing, issue tracking, and knowledge base management.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v3.2</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-laptop"></i> Desktop
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 11 -->
                            <div class="system-card" data-category="analytics" data-system="performance">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop" alt="Performance Analytics">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-development">In Dev</span>
                                    <span class="card-category">Analytics</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Performance Analytics</h3>
                                    <p class="card-desc">Advanced performance metrics, KPI dashboards, and predictive analytics.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v0.8</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-globe"></i> Web
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 12 -->
                            <div class="system-card" data-category="operations" data-system="notification">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1557200134-90327ee9fafa?w=400&h=300&fit=crop" alt="Notification System">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Notification Center</h3>
                                    <p class="card-desc">Centralized communication platform for announcements and notifications.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.5</span>
                                            <span class="card-meta-item platform">
                                                <i class="bi bi-phone"></i> Mobile
                                            </span>
                                        </div>
                                        <button class="card-btn">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- No Results Message -->
                    <div class="no-results" id="noResults">
                        <i class="bi bi-inbox"></i>
                        <h4>No systems found</h4>
                        <p>Try selecting a different category</p>
                    </div>

                    <!-- Carousel Dots -->
                    <div class="carousel-dots" id="carouselDots"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-links">
                        <a href="#">Documentation</a>
                        <a href="#">Support</a>
                        <a href="#">Privacy</a>
                        <a href="#">Terms</a>
                    </div>
                    <div class="footer-copy">
                        © 2026 ONE FOPH. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal-overlay" id="systemModal">
        <div class="modal-content">
            <div class="modal-header-img">
                <img id="modalImage" src="" alt="">
                <button class="modal-close" id="modalClose">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-meta">
                    <span class="modal-badge badge-active" id="modalBadge">Active</span>
                    <span class="modal-version" id="modalVersion">v2.5</span>
                    <span class="modal-platform" id="modalPlatform">
                        <i class="bi bi-globe"></i> <span>Web</span>
                    </span>
                </div>
                <h2 class="modal-title" id="modalTitle">System Title</h2>
                <p class="modal-desc" id="modalDesc">System description goes here.</p>
                
                <div class="modal-info-grid" id="modalInfoGrid">
                    <div class="modal-info-item">
                        <i class="bi bi-calendar3"></i>
                        <div class="value" id="modalLastUpdate">Jan 2026</div>
                        <div class="label">Last Update</div>
                    </div>
                    <div class="modal-info-item">
                        <i class="bi bi-shield-check"></i>
                        <div class="value" id="modalAccess">All Staff</div>
                        <div class="label">Access Level</div>
                    </div>
                    <div class="modal-info-item">
                        <i class="bi bi-building"></i>
                        <div class="value" id="modalDepartment">IT</div>
                        <div class="label">Department</div>
                    </div>
                </div>

                <div class="modal-features">
                    <h6>Key Features</h6>
                    <div class="feature-list" id="modalFeatures"></div>
                </div>

                <div class="modal-actions">
                    <button class="btn-primary-glow">
                        <i class="bi bi-box-arrow-up-right"></i> Launch System
                    </button>
                    <button class="btn-secondary-outline">
                        <i class="bi bi-book"></i> Docs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // System Data
        const systemsData = {
            hrms: {
                title: "Human Resource Management",
                desc: "Complete HR solution for employee management, attendance tracking, performance evaluation, and organizational development. Streamline your HR processes with our comprehensive suite of tools.",
                image: "https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v2.5",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Jan 2026",
                access: "All Staff",
                department: "Human Resources",
                features: ["Employee Database", "Leave Management", "Performance Reviews", "Onboarding Portal", "Payroll Integration", "Reports & Analytics"]
            },
            fms: {
                title: "Financial Management System",
                desc: "Streamlined financial operations including budgeting, expense tracking, invoice management, and comprehensive financial reporting for better decision making.",
                image: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v3.1",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Feb 2026",
                access: "Finance Team",
                department: "Finance",
                features: ["Budget Planning", "Expense Tracking", "Invoice Management", "Financial Reports", "Cash Flow Analysis", "Tax Management"]
            },
            ims: {
                title: "Inventory Management System",
                desc: "Real-time inventory tracking, stock management, automated reorder notifications, and warehouse optimization tools for efficient supply chain management.",
                image: "https://images.unsplash.com/photo-1553413077-190dd305871c?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v1.8",
                platform: "Mobile",
                platformIcon: "bi-phone",
                lastUpdate: "Dec 2025",
                access: "Operations",
                department: "Supply Chain",
                features: ["Stock Tracking", "Barcode Scanning", "Reorder Alerts", "Warehouse Management", "Supplier Portal", "Inventory Reports"]
            },
            pms: {
                title: "Project Management System",
                desc: "Collaborative project planning, task assignment, milestone tracking, and team collaboration tools to deliver projects on time and within budget.",
                image: "https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=600&h=400&fit=crop",
                badge: "New",
                badgeClass: "badge-new",
                version: "v1.0",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Feb 2026",
                access: "All Staff",
                department: "Operations",
                features: ["Task Management", "Gantt Charts", "Team Collaboration", "Time Tracking", "Resource Planning", "Progress Reports"]
            },
            attendance: {
                title: "Attendance & Time Tracking",
                desc: "Automated attendance recording, biometric integration, shift scheduling, and overtime calculation for accurate workforce management.",
                image: "https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v2.2",
                platform: "Mobile",
                platformIcon: "bi-phone",
                lastUpdate: "Jan 2026",
                access: "All Staff",
                department: "Human Resources",
                features: ["Biometric Integration", "Shift Scheduling", "Overtime Calculation", "Leave Calendar", "Mobile Check-in", "Attendance Reports"]
            },
            bi: {
                title: "Business Intelligence Dashboard",
                desc: "Comprehensive analytics and reporting platform with interactive visualizations, custom dashboards, and data-driven insights for strategic decisions.",
                image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v4.0",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Feb 2026",
                access: "Management",
                department: "Analytics",
                features: ["Custom Dashboards", "Data Visualization", "Report Builder", "KPI Tracking", "Data Export", "Scheduled Reports"]
            },
            dms: {
                title: "Document Management System",
                desc: "Centralized document storage with version control, secure sharing, workflow automation, and compliance management capabilities.",
                image: "https://images.unsplash.com/photo-1568667256549-094345857637?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v2.0",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Nov 2025",
                access: "All Staff",
                department: "Administration",
                features: ["Cloud Storage", "Version Control", "Access Control", "Document Search", "Workflow Automation", "Audit Trail"]
            },
            procurement: {
                title: "Procurement System",
                desc: "End-to-end procurement workflow management from requisition to purchase order, vendor management, and contract administration.",
                image: "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=400&fit=crop",
                badge: "In Dev",
                badgeClass: "badge-development",
                version: "v0.9",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Feb 2026",
                access: "Procurement",
                department: "Finance",
                features: ["Purchase Requests", "Vendor Management", "Approval Workflow", "Contract Management", "RFQ Management", "Spend Analytics"]
            },
            lms: {
                title: "Training & Learning Management",
                desc: "Online training platform with course creation, content management, progress tracking, assessments, and certification management.",
                image: "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=400&fit=crop",
                badge: "New",
                badgeClass: "badge-new",
                version: "v1.0",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Jan 2026",
                access: "All Staff",
                department: "Human Resources",
                features: ["Course Library", "Video Training", "Assessments", "Certifications", "Progress Tracking", "Learning Paths"]
            },
            helpdesk: {
                title: "Helpdesk & Ticketing System",
                desc: "IT support ticketing system with SLA management, knowledge base, and automated routing for efficient issue resolution.",
                image: "https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v3.2",
                platform: "Desktop",
                platformIcon: "bi-laptop",
                lastUpdate: "Dec 2025",
                access: "All Staff",
                department: "IT Support",
                features: ["Ticket Management", "SLA Monitoring", "Knowledge Base", "Auto-routing", "Email Integration", "Performance Metrics"]
            },
            performance: {
                title: "Performance Analytics System",
                desc: "Advanced performance metrics, KPI monitoring, trend analysis, and predictive analytics for organizational excellence.",
                image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop",
                badge: "In Dev",
                badgeClass: "badge-development",
                version: "v0.8",
                platform: "Web",
                platformIcon: "bi-globe",
                lastUpdate: "Feb 2026",
                access: "Management",
                department: "Analytics",
                features: ["KPI Dashboards", "Trend Analysis", "Predictive Analytics", "Benchmarking", "Goal Tracking", "Custom Metrics"]
            },
            notification: {
                title: "Notification & Announcement Center",
                desc: "Centralized communication platform for company-wide announcements, push notifications, and targeted messaging.",
                image: "https://images.unsplash.com/photo-1557200134-90327ee9fafa?w=600&h=400&fit=crop",
                badge: "Active",
                badgeClass: "badge-active",
                version: "v1.5",
                platform: "Mobile",
                platformIcon: "bi-phone",
                lastUpdate: "Jan 2026",
                access: "All Staff",
                department: "Communications",
                features: ["Broadcast Messages", "Push Notifications", "Email Alerts", "Scheduled Posts", "Target Groups", "Read Receipts"]
            }
        };

        // Loading Tips
        const loadingTips = [
            "Preparing your dashboard experience",
            "Loading system configurations",
            "Connecting to services",
            "Initializing user interface",
            "Almost there..."
        ];

        // DOM Elements
        const track = document.getElementById('carouselTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtnTop = document.getElementById('prevBtnTop');
        const nextBtnTop = document.getElementById('nextBtnTop');
        const dotsContainer = document.getElementById('carouselDots');
        const filterTabs = document.querySelectorAll('.filter-tab');
        const allCards = document.querySelectorAll('.system-card');
        const visibleCountEl = document.getElementById('visibleCount');
        const noResults = document.getElementById('noResults');
        const preloader = document.getElementById('preloader');
        const mainContainer = document.getElementById('mainContainer');
        const progressFill = document.getElementById('progressFill');
        const progressPercent = document.getElementById('progressPercent');
        const loadingTip = document.getElementById('loadingTip');
        const mouseTrail = document.getElementById('mouseTrail');
        const mouseDot = document.getElementById('mouseDot');

        let currentIndex = 0;
        let visibleCards = [];
        let cardWidth = 344;
        let progress = 0;
        let tipIndex = 0;

        // ==================== ENHANCED PRELOADER ====================

        // Create Preloader Particles
        const preloaderParticles = document.getElementById('preloaderParticles');
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'preloader-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 3 + 's';
            particle.style.animationDuration = (Math.random() * 2 + 2) + 's';
            particle.style.background = ['var(--primary)', 'var(--accent)', 'var(--secondary)'][Math.floor(Math.random() * 3)];
            preloaderParticles.appendChild(particle);
        }

        // Simulate Loading Progress
        function simulateLoading() {
            const interval = setInterval(() => {
                progress += Math.random() * 15;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(interval);
                    setTimeout(hidePreloader, 500);
                }
                updateProgress(progress);
            }, 200);
        }

        function updateProgress(value) {
            progressFill.style.width = value + '%';
            progressPercent.textContent = Math.round(value) + '%';
            
            // Update tip based on progress
            const newTipIndex = Math.floor(value / 25);
            if (newTipIndex !== tipIndex && newTipIndex < loadingTips.length) {
                tipIndex = newTipIndex;
                loadingTip.style.opacity = '0';
                setTimeout(() => {
                    loadingTip.textContent = loadingTips[tipIndex];
                    loadingTip.style.opacity = '1';
                }, 200);
            }
        }

        function hidePreloader() {
            preloader.classList.add('fade-out');
            setTimeout(() => {
                preloader.style.display = 'none';
                mainContainer.classList.add('visible');
                initCarousel();
                initMouseEffects();
            }, 800);
        }

        // Start loading on page load
        window.addEventListener('load', () => {
            setTimeout(simulateLoading, 500);
        });

        // ==================== MOUSE EFFECTS ====================

        function initMouseEffects() {
            let mouseX = 0, mouseY = 0;
            let trailX = 0, trailY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;

                mouseDot.style.left = mouseX + 'px';
                mouseDot.style.top = mouseY + 'px';
                mouseDot.classList.add('active');
                mouseTrail.classList.add('active');
            });

            // Smooth trail following
            function animateTrail() {
                trailX += (mouseX - trailX) * 0.15;
                trailY += (mouseY - trailY) * 0.15;

                mouseTrail.style.left = trailX + 'px';
                mouseTrail.style.top = trailY + 'px';

                requestAnimationFrame(animateTrail);
            }
            animateTrail();

            // Hide on mouse leave
            document.addEventListener('mouseleave', () => {
                mouseDot.classList.remove('active');
                mouseTrail.classList.remove('active');
            });
        }

        // ==================== PARTICLES ====================

        // Create Particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 40; i++) {
            const particle = document.createElement('div');
            const type = Math.floor(Math.random() * 3) + 1;
            particle.className = `particle type-${type}`;
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (Math.random() * 15 + 15) + 's';
            particlesContainer.appendChild(particle);
        }

        // ==================== CARD EFFECTS ====================

        // Card Mouse Effect
        allCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                card.style.setProperty('--mouse-x', x + '%');
                card.style.setProperty('--mouse-y', y + '%');
            });
        });

        // ==================== CAROUSEL ====================

        // Calculate card width dynamically
        function calculateCardWidth() {
            const firstCard = document.querySelector('.system-card');
            if (firstCard) {
                const gap = parseInt(getComputedStyle(track).gap) || 24;
                cardWidth = firstCard.offsetWidth + gap;
            }
        }

        // Initialize Carousel
        function initCarousel() {
            calculateCardWidth();
            filterCards('all');
        }

        // Filter cards by category
        function filterCards(category) {
            visibleCards = [];
            
            allCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (category === 'all' || cardCategory === category) {
                    card.style.display = 'flex';
                    card.classList.remove('visible');
                    visibleCards.push(card);
                } else {
                    card.style.display = 'none';
                }
            });

            // Animate cards appearing
            visibleCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('visible');
                }, index * 80);
            });

            visibleCountEl.textContent = visibleCards.length;

            if (visibleCards.length === 0) {
                noResults.classList.add('show');
            } else {
                noResults.classList.remove('show');
            }

            currentIndex = 0;
            calculateCardWidth();
            updateCarousel();
            createDots();
        }

        // Filter Tab Click Handler
        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                filterTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                const filter = tab.getAttribute('data-filter');
                filterCards(filter);
            });
        });

        // Get visible cards count in viewport
        function getVisibleCount() {
            const wrapperWidth = document.querySelector('.carousel-wrapper').offsetWidth;
            return Math.floor(wrapperWidth / cardWidth) || 1;
        }

        // Update carousel position
        function updateCarousel() {
            const offset = currentIndex * cardWidth;
            track.style.transform = `translateX(-${offset}px)`;
            updateButtons();
            updateDots();
        }

        // Update navigation buttons
        function updateButtons() {
            const viewportCards = getVisibleCount();
            const maxIndex = Math.max(0, visibleCards.length - viewportCards);
            
            prevBtn.disabled = currentIndex <= 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            prevBtnTop.disabled = currentIndex <= 0;
            nextBtnTop.disabled = currentIndex >= maxIndex;
        }

        // Create dots
        function createDots() {
            dotsContainer.innerHTML = '';
            const viewportCards = getVisibleCount();
            const totalSlides = Math.ceil(visibleCards.length / viewportCards);

            if (totalSlides <= 1) {
                dotsContainer.style.display = 'none';
                return;
            }

            dotsContainer.style.display = 'flex';

            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.classList.add('carousel-dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    currentIndex = i * viewportCards;
                    if (currentIndex > visibleCards.length - viewportCards) {
                        currentIndex = visibleCards.length - viewportCards;
                    }
                    updateCarousel();
                });
                dotsContainer.appendChild(dot);
            }
        }

        // Update dots
        function updateDots() {
            const viewportCards = getVisibleCount();
            const activeDotIndex = Math.floor(currentIndex / viewportCards);
            const dots = document.querySelectorAll('.carousel-dot');
            
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === activeDotIndex);
            });
        }

        // Navigation handlers
        function goToPrev() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        function goToNext() {
            const viewportCards = getVisibleCount();
            const maxIndex = Math.max(0, visibleCards.length - viewportCards);
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateCarousel();
            }
        }

        prevBtn.addEventListener('click', goToPrev);
        nextBtn.addEventListener('click', goToNext);
        prevBtnTop.addEventListener('click', goToPrev);
        nextBtnTop.addEventListener('click', goToNext);

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') goToPrev();
            if (e.key === 'ArrowRight') goToNext();
        });

        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        track.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        track.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    goToNext();
                } else {
                    goToPrev();
                }
            }
        }

        // Resize handler
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                calculateCardWidth();
                
                const viewportCards = getVisibleCount();
                const maxIndex = Math.max(0, visibleCards.length - viewportCards);
                if (currentIndex > maxIndex) {
                    currentIndex = maxIndex;
                }
                
                updateCarousel();
                createDots();
            }, 150);
        });

        // ==================== MODAL ====================

        const modal = document.getElementById('systemModal');
        const modalClose = document.getElementById('modalClose');

        allCards.forEach(card => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('.card-btn')) {
                    e.stopPropagation();
                    return;
                }

                const systemKey = card.getAttribute('data-system');
                const system = systemsData[systemKey];

                if (system) {
                    document.getElementById('modalImage').src = system.image;
                    document.getElementById('modalTitle').textContent = system.title;
                    document.getElementById('modalDesc').textContent = system.desc;
                    
                    const badgeEl = document.getElementById('modalBadge');
                    badgeEl.textContent = system.badge;
                    badgeEl.className = 'modal-badge ' + system.badgeClass;

                    document.getElementById('modalVersion').textContent = system.version;
                    
                    const platformEl = document.getElementById('modalPlatform');
                    platformEl.innerHTML = `<i class="bi ${system.platformIcon}"></i> <span>${system.platform}</span>`;

                    document.getElementById('modalLastUpdate').textContent = system.lastUpdate;
                    document.getElementById('modalAccess').textContent = system.access;
                    document.getElementById('modalDepartment').textContent = system.department;

                    const featuresEl = document.getElementById('modalFeatures');
                    featuresEl.innerHTML = system.features.map(f => `
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>${f}</span>
                        </div>
                    `).join('');

                    modal.classList.add('active');
                }
            });
        });

        modalClose.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });

        function closeModal() {
            modal.classList.remove('active');
        }
    </script>
</body>
</html>