# WCM2020 BS-RECIPES Project
## SUMMARY
  [BS-Recipes All Reci-pies](http://visiface.store/bs_recipes/bs_recipie/)
  
  Student: Kimberly Karlsson

  Site Project for School using WordPress Themes and Functionality: "The assignment consists of you developing a brand new site (incl. your own WordPress theme) for a customer who wants to be able to publish recipes under different categories."

---------------------------------------

## RESOURCES:

 - [theHiveResistance](https://wcm20.thehiveresistance.com/cms-saf-inlamningsuppgift/) : Assignment Blog
 - [github](https://github.com/visiface/bs-recipes) : Repository for the Theme
 - [underscores](https://underscores.me/) : Starter for Theme
 - [BS-Recipes](https://visiface.store/bs_recipes/) : Link to the Project on-site/live.

---------------------------------------

## NOTES AND MUSINGS

- Always doublecheck if SCSS Compiler is on. Would save SO much headache.
- More SCSS practice to keep from going into too deep into "nesting hell".
- WP Handbook: lifesaver.
- underscores: good!
- learn react: learn gutenburg. 
- next time, just use the theme hero img instead of using gutenburg feature, bc the content padding will affect hero images made in gutenburg (with current css, at least). 
- don't want to target just h2's and p's, that defeats the purpose. need to think ahead for more blocks that gb has.
- further familiarize with Translation/Pot files, LocoTranslate, or other translator plugins to further set up strings.
- API's. thinking emoji.
- The Categories only show up if a recipe with that category exists, remember that for future projects, because need to test if the logic is being put in the correct place. get terms by default hides empty! GOT IT.
- DB connections w SFTP
- Realized I spelled recipe wrong as "recipie" but gonna roll with it: that's funny.

---------------------------------------

## ASSIGNMENT GENERAL REQUIREMENTS

- The theme should be fully responsive.
- Support a blog (including archive pages for categories and other relevant Theme Templates).
- Have an updated screenshot.
- Support to be translated into any language.
- The site should be published live on a subdomain on your web host.

---------------------------------------

## ASSIGNMENT TECHNICAL REQUIREMENTS

- The theme should be version managed in GIT from the beginning!
- If BootScore is used, it should be based on our boilerplate code from [day 9](wcm20-cms-saf-bootscore-5-boilerplate-with-sass.zip)!
- All template files should be built with code and Advanced Custom Fields.
- Any template files that are not in use and possibly followed with your starter template should be deleted (or moved to the folder).unused-template-files
- Use Custom Post Types for the recipes (can be built with CPT UI but should be exported to code).
- Use Custom Taxonomies for recipe categories and tags (can be built with CPT UI but should be exported to code).
- Use Advanced Custom Fields.
- All CPT and CT should be registered through the theme and not be dependent on a plugin.
- ACF should be included in the theme and all Field Groups exported so they are registered by the theme.
- Note! If you're using ACF Pro, you'll need to add to yours before committing for the first time after you insert the plugin!!includes/acf-pro.gitignore
- One. POT file with all translation strings should accompany the theme.
- Be correctly indented in the same way through all (self-written) code.
- All files to the theme should be
- have correct logical file names.
- be grouped into folders (where possible).