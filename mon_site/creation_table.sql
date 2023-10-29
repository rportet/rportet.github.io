CREATE TABLE IF NOT EXISTS public.formulaire
(
    nom character varying(30) COLLATE pg_catalog."default" NOT NULL,
    id integer NOT NULL DEFAULT nextval('"formulaire_Id_seq"'::regclass),
    courriel character varying(256) COLLATE pg_catalog."default" NOT NULL,
    telephone character varying(20) COLLATE pg_catalog."default",
    motif numeric(1,0),
    creneau time without time zone,
    demande character varying(3) COLLATE pg_catalog."default",
    message character varying(500) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT formulaire_pkey PRIMARY KEY (id)
);
