---
name: boilerplate-editor
description: beyondS ツール集の雛形HTML（boilerplate）を編集する。「雛形を編集したい」「boilerplateを変更して」「テンプレートを更新して」など、ツールページの共通テンプレートを修正する場合に使用する。
---

# beyondS 雛形テンプレート編集

ツールページの雛形HTMLを編集するワークフロー。

## 雛形ファイルの場所

唯一の正本: `.claude/skills/tool-creator/assets/boilerplate.html`

プロジェクト直下には `boilerplate.html` は存在しない。tool-creator スキルの assets 内のファイルが唯一の雛形である。

## ワークフロー

### 1. 現状確認

まず雛形ファイルを Read ツールで読み、現在の内容を把握する。

### 2. 編集内容の確認

AskUserQuestion ツールを使い、変更内容を確認する:
- 何を変更するか
- 変更の意図・理由

### 3. 雛形を編集

Edit ツールで `.claude/skills/tool-creator/assets/boilerplate.html` を編集する。

### 4. 整合性確認

変更内容に応じて、以下も確認・更新する:

- **tool-creator の SKILL.md**: 雛形の構造に関する記述がある場合、変更に合わせて更新する (`.claude/skills/tool-creator/SKILL.md`)
- **project-structure.md**: CSSクラスやレイアウトに関する変更がある場合、更新する (`.claude/skills/tool-creator/references/project-structure.md`)

## 注意事項

- 雛形のプレースホルダー（`ツールタイトル`、`ツールセクション見出し` 等）は tool-creator スキルが差し替える前提なので、削除しないこと
- `./main.css`、`./js/footer.js` の読み込みは必須。削除しないこと
- header / footer の構造は全ページ共通。雛形での変更は既存ツールページには反映されない点をユーザーに伝えること
