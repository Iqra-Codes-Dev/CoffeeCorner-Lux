const cursor = document.querySelector('.main-cursor');

// Mouse move pe cursor move + trail
document.addEventListener('mousemove', function(e) {
    let x = e.clientX;
    let y = e.clientY;

    // Main Circle ko mouse ki jagah move karna
    cursor.style.left = x + 'px';
    cursor.style.top = y + 'px';

    // Trail create karna (3 particles per move for more effect)
    for(let i=0; i<3; i++){
        createParticle(x, y);
    }
});

// Particle creation function
function createParticle(x, y) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    // Cute shapes: zyada ☕ 🌸 ✨ aur extra fun symbols
    const shapes = ['🌸', '✨', '☕', '💫', '🌼', '❀', '🌟', '☕', '🌸', '✨', '☕']; 
    particle.innerHTML = shapes[Math.floor(Math.random() * shapes.length)];

    // Colors: Brown, Gold, Pink, Light Coffee
    const colors = ['#43150A', '#fdc20c', '#FFB7C5', '#A0522D', '#FFF5E1'];
    particle.style.color = colors[Math.floor(Math.random() * colors.length)];

    // Random phailne ki direction aur rotation
    const destX = (Math.random() - 0.5) * 80 + 'px';
    const destY = (Math.random() - 0.5) * 80 + 'px';
    const rotation = Math.random() * 360 + 'deg';

    particle.style.setProperty('--x', destX);
    particle.style.setProperty('--y', destY);
    particle.style.setProperty('--r', rotation);

    particle.style.left = x + 'px';
    particle.style.top = y + 'px';
    particle.style.fontSize = Math.random() * 16 + 8 + 'px'; 

    document.body.appendChild(particle);

    setTimeout(() => {
        particle.remove();
    }, 1000); 
}



// Click pe aur extra sparkles (7 particles)
document.addEventListener('click', (e) => {
    for(let i=0; i<7; i++) {
        createParticle(e.clientX, e.clientY);
    }
});
