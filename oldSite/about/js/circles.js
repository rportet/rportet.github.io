// Add this script at the end of your body (before closing </body> tag)
document.addEventListener('DOMContentLoaded', function() {
    const skills = document.querySelectorAll('.skill-item');
    
    skills.forEach(skill => {
        const percentage = parseFloat(skill.dataset.percentage);
        const circle = skill.querySelector('.progress-ring-circle');
        const radius = circle.r.baseVal.value;
        const circumference = 2 * Math.PI * radius;
        const offset = circumference - (percentage / 100 * circumference);

        circle.style.strokeDasharray = circumference;
        circle.style.strokeDashoffset = circumference;

        skill.addEventListener('mouseenter', () => {
            circle.style.strokeDashoffset = offset;
        });

        skill.addEventListener('mouseleave', () => {
            circle.style.strokeDashoffset = circumference;
        });
    });
});