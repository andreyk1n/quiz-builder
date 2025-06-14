document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.qb-quiz').forEach(function (quiz) {
    let score = 0;
    let current = 0;
    const questions = quiz.querySelectorAll('.qb-question');
    const result = quiz.querySelector('.qb-result');

    questions.forEach(q => {
      q.querySelectorAll('.qb-answer').forEach(btn => {
        btn.addEventListener('click', () => {
          if (btn.classList.contains('clicked')) return;
          btn.classList.add('clicked');
          const correct = btn.dataset.correct === '1';
          btn.classList.add(correct ? 'correct' : 'uncorrect');
          if (correct) score++;

          setTimeout(() => {
            questions[current].style.display = 'none';
            current++;
            if (current < questions.length) {
              questions[current].style.display = 'block';
            } else {
              result.style.display = 'block';
              result.innerHTML = `<p>Правильних відповідей: ${score} з ${questions.length}</p>`;
            }
          }, 3000);
        });
      });
    });
  });
});