<?php
// *** LICENSE ***
// oText is free software.
//
// By Fred Nassar (2006) and Timo Van Neerden (since 2010)
// See "LICENSE" file for info.
// *** LICENSE ***

/* ##############################################################################################
   ----------------------------------------- Francais -----------------------------------------*/

$GLOBALS['lang'] = array_merge($GLOBALS['lang'], array(
'id'							=> 'fr',

// Navigation
'preferences'					=> 'Préférences',
'connexion' 					=> 'Connexion',
'enregistrer' 					=> 'Enregistrer',
'valider'	 					=> 'Valider',
'annuler'	 					=> 'Annuler',
'editer' 						=> 'Éditer',
'activer'	 					=> 'Activer',
'desactiver'	 				=> 'Désactiver',
'mesarticles' 					=> 'Mes articles',
'mesliens'	 					=> 'Mes liens',
'mesnotes'	 					=> 'Mes notes',
'mesabonnements'				=> 'Mes abonnements',
'monagenda'						=> 'Mon agenda',
'nouveau' 						=> 'Nouvel article',
'supprimer' 					=> 'Supprimer',
'telecharger' 					=> 'Télécharger',
'deconnexion' 					=> 'Déconnexion',
'oui' 							=> 'Oui',
'non' 							=> 'Non',
'ouverts' 						=> 'Autorisés',
'fermes' 						=> 'Interdits',
'sur' 							=> 'sur',
'ou'							=> 'ou',
'label_creee_le'				=> 'créée le',
'voir_sur_le_blog'				=> 'Voir sur le blog',
'byte_symbol'					=> 'o',
'using'							=> 'avec',
'rendered'						=> 'généré en',
'recherche'						=> 'Les résultats de recherche pour',

// Install
'install'						=> 'Installation',
'install_id'					=> 'Choisissez un identifiant : ',
'install_mdp'					=> 'Choisissez un mot de passe : ',
'install_choose_sgdb'			=> 'Choisissez votre SGDB : ',
'install_err_mysql_usr_empty'	=> 'L’utilisateur MySQL n’a pas été indiqué.',
'install_err_mysql_pss_empty'	=> 'Le mot de passe MySQL n’a pas été indiqué.',
'install_err_mysql_hst_empty'	=> 'Le « hostname » MySQL n’a pas été indiqué.',
'install_err_mysql_dba_empty'	=> 'Le nom de la base de donnée MySQL n’a pas été indiqué.',
'install_err_mysql_connect'		=> 'Échec lors de la connexion à MySQL avec ces informations.',
'first_titre' 					=> 'Mon premier article',
'first_edit' 					=> 'Éditez-moi',

// Questions
'question_suppr_article'		=> 'Cet article et ses commentaires seront définitivement supprimés !',
'question_suppr_image'			=> 'Cette image sera définitivement supprimée !',
'question_suppr_comment'		=> 'Ce commentaire sera définitivement supprimé !',
'question_suppr_fichier'		=> 'Ce fichier sera définitivement supprimé !',
'question_suppr_note'			=> 'Cette note sera définitivement supprimée !',
'question_suppr_event'			=> 'Cet événement sera définitivement supprimé !',
'question_quit_page'			=> 'Vos modifications n’ont pas été enregistrées. Quitter la page provoquera la perte des données.',
'question_clean_rss'			=> 'Tous les articles lus seront supprimés de la BDD ?',
'question_show_past_events'		=> 'Afficher les événnements passés ?',
'question_entire_day'			=> 'Toute la journée ?',

// Confirmations
'confirm_article_suppr'			=> 'L’article a été supprimé.',
'confirm_article_ajout'			=> 'L’article a été enregistré.',
'confirm_article_maj'			=> 'L’article a été mis à jour.',
'confirm_fichier_ajout'			=> 'Le fichier a été ajouté.',
'confirm_fichier_suppr'			=> 'Le fichier a été supprimé.',
'confirm_fichier_edit'			=> 'Les informations du fichier ont été éditées.',
'confirm_prefs_maj'				=> 'Vos préférences ont été enregistrées.',
'confirm_comment_ajout'			=> 'Votre commentaire a été ajouté.',
'confirm_comment_suppr'			=> 'Le commentaire a été supprimé.',
'confirm_comment_edit'			=> 'Le commentaire a été édité.',
'confirm_comment_valid'			=> 'Le statut du commentaire a été modifié.',
'confirm_link_ajout'			=> 'Le lien a été ajouté.',
'confirm_link_suppr'			=> 'Le lien a été supprimé.',
'confirm_link_edit'				=> 'Le lien a été édité.',
'confirm_feed_update'			=> 'Les flux ont été mis à jour ',
'confirm_feeds_edit'			=> 'Les flux ont été édités.',
'confirm_feed_ajout'			=> 'Le flux a été ajouté.',
'confirm_feed_clean'			=> 'Tous les anciens éléments ont été supprimés.',
'confirm_note_enregistree'		=> 'Notes enregistrées.',
'confirm_agenda_updated'		=> 'Agenda mis à jour.',

// No-confirmation	
'error_image_add'				=> 'Le fichier n’a pas pu être ajoutée',
'error_phpajax'					=> 'Une erreur PHP/Ajax s’est produite :',
'error_comment_suppr'			=> 'Le commentaire n’a pas été supprimé suite à une erreur.',
'error_comment_valid'			=> 'Le statut du commentaire n’a pas été modifié suite à une erreur.',

// Redirections
'retour_liste'					=> '« Liste des articles',

// Titres des pages
'bienvenue'						=> 'Bienvenue',
'titre_identification' 			=> 'Veuillez vous identifier',
'titre_articles' 				=> 'Vos articles',
'titre_ecrire' 					=> 'Écrire un nouvel article',
'titre_maj' 					=> 'Mise à jour d’un article',
'titre_commentaires' 			=> 'Commentaires',
'titre_preferences' 			=> 'Préférences',
'titre_fichier'					=> 'Fichiers',
'titre_maintenance'				=> 'Maintenance',

// Preferences
'prefs_legend_utilisateur'		=> 'Utilisateur',
'prefs_legend_apparence'		=> 'Apparence',
'prefs_legend_securite'			=> 'Sécurité',
'prefs_legend_langdateheure'	=> 'Langue, date et heure',
'prefs_legend_configblog'		=> 'Blog et commentaires',
'prefs_legend_configlinx'		=> 'Liens',
'prefs_legend_configrss'		=> 'Flux RSS',
'pref_auteur'					=> 'Auteur : ',
'pref_email'					=> 'Adresse e-mail : ',
'pref_identifiant'				=> 'Identifiant : ',
'pref_mdp'						=> 'Mot de passe actuel : ',
'pref_mdp_nouv'					=> 'Nouveau mot de passe : ',
'pref_langue'					=> 'Langue : ',
'pref_nom_site'					=> 'Nom du site : ',
'pref_keywords'					=> 'Mots clés : ',
'pref_format_date'				=> 'Format de la date : ',
'pref_format_heure'				=> 'Format de l’heure : ',
'pref_racine'					=> 'URL du blog : ',
'pref_nb_maxi'					=> 'Nombre d’articles sur le blog : ',
'pref_nb_list'					=> 'Nombre d’articles liste admin : ',
'pref_nb_list_com'				=> 'Nombre de commentaires liste admin : ',
'pref_nb_list_linx'				=> 'Nombre de liens dans la liste admin : ',
'pref_fuseau_horaire'			=> 'Fuseau horaire : ',
'pref_comm_BoW_list'			=> 'Les commentaires sont visibles : ',
'pref_comm_white_list'			=> 'Après que vous les ayez validés.',
'pref_comm_black_list'			=> 'Dés qu’ils sont postés.',
'pref_automatic_keywords'		=> 'Mots-clés meta automatiques : ',
'pref_force_email'				=> 'L’email est exigée pour commenter : ',
'pref_theme'					=> 'Thème du blog : ',
'pref_categories'				=> 'Classement des billets par catégories : ',
'pref_allow_global_coms'		=> 'Fermeture de tous les commentaires : ',
'pref_all'						=> 'Tout',
'pref_go_to_maintenance'		=> 'Accéder à la page de maintenance : ',
'pref_rss_go_to_imp-export'		=> 'Accéder à la page d’import/export OMPL : ',
'pref_label_bookmark_lien'		=> 'Bookmarklet pour partager des liens : ',
'pref_label_crontab_rss'		=> 'Ligne "crontab" pour MÀJ auto des flux : ',
'pref_alert_crontab_rss'		=> 'Copiez cette ligne dans votre Crontab :',
'pref_linx_dl_auto'				=> 'Importation automatique des fichiers partagés :',
'pref_ask_everytime'			=> 'Demander à chaque fois',
'pref_check_update'				=> 'Vérifier les mises à jour automatiquement',
'pref_id_format'				=> 'Format de l’URL des articles :',
'pref_id_format_ymdhis'			=> 'Format date : '.date('YmdHis'),
'pref_id_format_rand6'			=> 'Chaine aléatoire: -ebd68b-',
'maintenance_optim'				=> 'Nettoyer la base de données',

// placeholders
'placeholder_nom_fichier'		=> 'nom',
'placeholder_description'		=> 'description',
'placeholder_titre'				=> 'titre',
'placeholder_chapo'				=> 'chapô',
'placeholder_notes'				=> 'notes',
'placeholder_contenu'			=> 'contenu',
'placeholder_motscle'			=> 'mots clés',
'placeholder_folder'			=> 'album',
'placeholder_tags'				=> 'tags',
'placeholder_url'				=> 'url',

// Notes
'note_no_note'					=> 'Aucune note',
'note_no_event'					=> 'Aucune événement',
'note_no_image'					=> 'Aucune image',
'note_no_fichier'				=> 'Aucun fichier',
'note_no_feed'					=> 'Aucun flux RSS',
'note_no_feed_entry'			=> 'Aucune entrée RSS',
'note_no_notifs'				=> 'Aucune notification',

// Formulaire Images
'label_jusqua'					=> 'Jusqu’à ',
'label_parfichier'				=> ' par fichier',
'label_codes'			    	=> 'Codes d’intégration :',
'img_upload'					=> 'Envoyer',
'img_specifier_url'				=> 'Spécifier une URL à la place',
'img_upload_un_fichier'			=> 'Envoyer un seul fichier',
'img_drop_files_here'			=> 'Déposez vos fichiers ici',

// page backup
'bak_succes_save'				=> 'Sauvegarde réussie',
'maintenance_ask_do_what'		=> 'Que voulez-vous faire ?',
'maintenance_export'			=> 'Exporter',
'maintenance_incl_quoi'			=> 'Que voulez vous dans votre sauvegarde ?',
'maintenance_import'			=> 'Importer',
'bak_chooseaction'				=> 'Que voulez-vous faire ?',
'bak_choosefile'				=> 'Choisir un fichier',
'bak_restor_done'				=> 'Restauration effectuée',
'bak_optim_done'				=> 'Nettoyage terminé',
'bak_articles_do'				=> 'Inclure les articles',
'bak_comments_do'				=> 'Inclure les commentaires des articles',
'bak_links_do'					=> 'Inclure les liens',
'bak_notes_do'					=> 'Inclure les notes',
'bak_agenda_do'					=> 'Inclure l’agenda',
'bak_number_articles'			=> 'Nombre d’articles',
'bak_combien_images'			=> 'Combien d’images ?',
'bak_combien_linx'				=> 'Combien de liens ?',
'bak_import_btjson'				=> 'Importer un fichier <strong>JSON</strong> de BlogoText',
'bak_import_netscape'			=> 'Importer un fichier <strong>HTML</strong> de liens Netscape',
'bak_import_rssopml'			=> 'Importer un fichier <strong>OPML</strong> de liste de flux RSS',
'bak_export_json'				=> 'Exporter les données diverses au format <strong>JSON</strong>',
'bak_export_netscape'			=> 'Exporter les liens au format <strong>HTML</strong> de Netscape',
'bak_export_zip'				=> 'Exporter les fichiers du Blog une archive <strong>ZIP</strong>',
'bak_export_opml'				=> 'Exporter la liste des flux RSS au format <strong>OPML</strong>',
'bak_incl_sqlit'				=> 'Inclure la base SQLite',
'bak_incl_confi'				=> 'Inclure le fichier des préférences',
'bak_incl_files'				=> 'Inclure les images et les documents',
'bak_incl_theme'				=> 'Inclure les fichiers de themes',
'bak_opti_miniature'			=> 'Recréer les miniatures des images',
'bak_opti_vacuum'				=> 'Reconstruire la base de donnée',
'bak_opti_recountcomm'			=> 'Reconstruire l’association articles/commentaires',
'bak_opti_supprreadrss'			=> 'Supprimer les entrées RSS lues',
'bak_dl_fichier'				=> 'Télécharger le fichier.',

// page RSS
'rss_label_all_feeds'			=> 'Tous les flux',
'rss_label_today_feeds'			=> 'Aujourd’hui',
'rss_label_favs_feeds'			=> 'Favoris',
'rss_label_refresh'				=> 'Recharger',
'rss_label_markasread'			=> 'Marquer comme lu',
'rss_label_unfoldall'			=> 'Tout déplier',
'rss_label_addfeed'				=> 'Ajouter un flux',
'rss_label_clean'				=> 'Nettoyer',
'rss_label_unread'				=> 'Non lus',
'rss_label_titre_flux'			=> 'Titre du flux :',
'rss_label_url_flux'			=> 'Url du flux :',
'rss_label_dossier'				=> 'Dossier (optionnel)',
'rss_label_config'				=> 'Éditer la liste des flux',
'rss_nothing_here_note'			=> 'Rien ici ? Importez un fichier OPML en cliquant ici : ',
'rss_jsalert_new_link'			=> 'Url complète du flux RSS/Atom :',
'rss_jsalert_new_link_folder'	=> 'Dossier du flux (ou laisser vide) :',
'rss_raccourcis_clavier'		=> 'Ctrl+Haut = lire l’élément précédent, Ctrl+Bas = lire l’élément suivant.',
'rss_nouveau_flux'				=> 'nouveaux élements.',

// vérifier les mises à jours
'maint_chk_update'				=> 'Mises à jour',
'maint_update_youisgood'		=> 'Blogotext est à jour',
'maint_update_youisbad'			=> 'Une nouvelle version de Blogotext est disponible !',
'maint_update_go_dl_it'			=> 'Vous pouvez la télécharger à l’adresse :',

// Erreurs
'err_titre' 					=> 'Le titre est vide',
'err_file_write'				=> 'Impossible de créer le fichier',
'err_prefs_auteur'				=> 'Le nom de l’auteur est vide',
'err_prefs_email'				=> 'L’adresse e-mail n’est pas valide',
'err_prefs_identifiant'			=> 'Le nom d’utilisateur est vide',
'err_prefs_id_mdp'				=> 'Pour définir un nouvel identifiant, vous devez saisir votre mot de passe',
'err_prefs_id_syntaxe'			=> 'Le nouvel identifiant ne peut pas comporter les caractères \', ", \\, | ou =.' ,
'err_prefs_oldmdp'				=> 'L’ancien mot de passe n’est pas valide',
'err_prefs_mdp'					=> 'Le mot de passe doit faire au moins 6 caractères',
'err_prefs_mdp_weak'			=> 'Le mot de passe est faible, continuer ?',
'err_prefs_newmdp'				=> 'Pour définir un nouveau mot de passe, vous devez saisir l’ancien',
'err_prefs_nbmax'				=> 'Le nombre d’articles n’est pas valide',
'err_prefs_racine'				=> 'Vous devez indiquer l’URL du blog',
'err_prefs_racine_http'			=> 'L’URL du blog doit commencer par "http://" ou "https://"',
'err_prefs_racine_slash'		=> 'L’URL du blog doit finir par un slash "/"',
'err_lien_vide'					=> 'L’URL est vide',
'err_feed_exists'				=> 'Le flux existe déjà.',
'err_feed_wrong_param'			=> 'Mauvaise requête.',

// Titles - liens
'lien_article'					=> 'Voir en ligne',
'lien_blog'						=> 'Voir le blog',
'go_to_pref'					=> 'Allez dans les préférences pour changer le titre.',

// Label avec " : "
'label_dp_description'			=> 'Description : ',
'label_dp_type'					=> 'Type (extension) : ',
'label_dp_dossier'				=> 'Album : ',
'label_dp_date'					=> 'Date : ',
'label_dp_dimensions'			=> 'Dimensions : ',
'label_dp_visibilite'			=> 'Visibilité : ',
'label_dp_etat'					=> 'État : ',
'label_dp_commentaires'			=> 'Commentaires : ',
'label_dp_poids'				=> 'Poids du fichier : ',
'label_dp_checksum'				=> 'Sha1 : ',
'label_dp_identifiant'			=> 'Identifiant : ',
'label_dp_motdepasse'			=> 'Mot de passe : ',

// Modes
'ecrire'						=> 'Modifier l’article ',
'apercu'						=> 'Aperçu',

// Labels
'label_date'					=> 'Date',
'label_titre'					=> 'Titre',
'label_contenu'					=> 'Contenu',
'label_description'				=> 'Description',
'label_publie'					=> 'Publié',
'label_publies'					=> 'Publiés',
'label_invisible'				=> 'Invisible',
'label_invisibles'				=> 'Invisibles',
'label_note_ajout'				=> 'Créer une note…',
'label_feed_ajout'				=> 'Ajouter un flux',
'label_event_ajout'				=> 'Ajouter un événement',
'label_add_title'				=> 'Ajouter un titre',
'label_add_location'			=> 'Ajouter un lieu',
'label_add_description'			=> 'Ajouter une description',
'label_feed_new'				=> 'Nouveau flux ',
'label_article_derniers'		=> 'Articles récents',
'label_comment_derniers'		=> 'Commentaires récents',
'label_link_derniers'			=> 'Liens récents',
'label_note_derniers'			=> 'Notes récentes',
'label_fichier_derniers'		=> 'Fichiers récents',
'label_link'					=> 'lien',
'label_links'					=> 'liens',
'label_element'					=> 'élément',
'label_elements'				=> 'éléments',
'label_image'					=> 'image',
'label_images'					=> 'images',
'label_feeds'					=> 'flux RSS',
'label_feed_entry'				=> 'Entrée RSS',
'label_feed_entrys'				=> 'Entrées RSS',
'label_import-export'			=> 'Import/Export',
'label_fichier'					=> 'fichier',
'label_fichiers'				=> 'fichiers',
'label_note'					=> 'Note',
'label_notes'					=> 'Notes',
'label_agenda'					=> 'Agenda',
'label_event'					=> 'Événement',
'label_events'					=> 'Événements',
'label_nouv_lien'				=> 'Ajouter un lien…',
'label_lien_priv'				=> 'Le lien est privé ?',
'label_file_priv'				=> 'Le fichier est privé ?',
'label_stay_logged'				=> 'Rester connecté ?',
'label_resume'					=> 'Résumé',
'label_dl_fichier'				=> 'Également importer le fichier ? ',
'label_all_comm_by_author'		=> 'Tous les commentaires de cet auteur',

));
