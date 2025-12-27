function renderFooter() {
  const target = document.getElementById("site-footer");
  if (!target) return;

  const pathParts = window.location.pathname.split("/").filter(Boolean);
  let backLink = "./index.html";
  if (pathParts.length > 1) {
    backLink = "../".repeat(pathParts.length - 1) + "index.html";
  }

  target.innerHTML = `
    <div class="container foot-inner">
      <span>powered by <a href="https://beyonds.ai/">beyondS,Inc.</a></span>
      <a href="${backLink}">一覧へ戻る</a>
      <a class="footer-icon" href="https://github.com/beyonds-inc/open-tools" aria-label="GitHub リポジトリ" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M12 1.5c-5.8 0-10.5 4.7-10.5 10.6 0 4.7 3 8.6 7.2 10 0.5 0.1 0.7-0.2 0.7-0.5v-1.8c-2.9 0.6-3.5-1.2-3.5-1.2-0.5-1.3-1.2-1.7-1.2-1.7-1-0.7 0.1-0.7 0.1-0.7 1.1 0.1 1.7 1.2 1.7 1.2 1 1.7 2.7 1.2 3.3 0.9 0.1-0.8 0.4-1.2 0.7-1.5-2.3-0.3-4.7-1.2-4.7-5.2 0-1.2 0.4-2.1 1.1-2.9-0.1-0.3-0.5-1.4 0.1-2.9 0 0 0.9-0.3 2.9 1.1 0.8-0.2 1.7-0.4 2.6-0.4 0.9 0 1.8 0.1 2.6 0.4 2-1.4 2.9-1.1 2.9-1.1 0.6 1.5 0.2 2.6 0.1 2.9 0.7 0.8 1.1 1.7 1.1 2.9 0 4-2.4 4.9-4.7 5.2 0.4 0.3 0.7 0.9 0.7 1.9v2.8c0 0.3 0.2 0.6 0.7 0.5 4.2-1.4 7.2-5.3 7.2-10 0-5.9-4.7-10.6-10.5-10.6z"></path>
        </svg>
        <span>GitHub</span>
      </a>
      <a href="https://beyonds.ai/contact">お問い合わせ</a>
    </div>
  `;
}

document.addEventListener("DOMContentLoaded", renderFooter);
