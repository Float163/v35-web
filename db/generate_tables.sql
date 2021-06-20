-- public.patients definition

-- Drop table

-- DROP TABLE public.patients;

CREATE TABLE public.patients (
	id serial NOT NULL,
	"name" varchar(255) NOT NULL,
	surname varchar(255) NOT NULL,
	patronymic varchar(255) NOT NULL,
	birthdate timestamp(0) NOT NULL,
	CONSTRAINT patients_pkey PRIMARY KEY (id)
);

-- public.doctors definition

-- Drop table

-- DROP TABLE public.doctors;

CREATE TABLE public.doctors (
	id serial NOT NULL,
	"name" varchar(255) NOT NULL,
	surname varchar(255) NOT NULL,
	patronymic varchar(255) NOT NULL,
	profile varchar(255) NOT NULL,
	CONSTRAINT doctors_pkey PRIMARY KEY (id)
);

-- public.directory_diagnoses definition

-- Drop table

-- DROP TABLE public.directory_diagnoses;

CREATE TABLE public.directory_diagnoses (
	id serial NOT NULL,
	"name" varchar(255) NOT NULL,
	CONSTRAINT directory_diagnoses_pkey PRIMARY KEY (id)
);

-- public.directory_drugs definition

-- Drop table

-- DROP TABLE public.directory_drugs;

CREATE TABLE public.directory_drugs (
	id serial NOT NULL,
	"name" varchar(255) NOT NULL,
	CONSTRAINT directory_drugs_pkey PRIMARY KEY (id)
);

-- public.diagnoses definition

-- Drop table

-- DROP TABLE public.diagnoses;

CREATE TABLE public.diagnoses (
	id serial NOT NULL,
	patient_id int4 NOT NULL,
	diagnose_id int4 NOT NULL,
	"date" timestamp(0) NOT NULL,
	CONSTRAINT diagnoses_pkey PRIMARY KEY (id)
);


-- public.diagnoses foreign keys

ALTER TABLE public.diagnoses ADD CONSTRAINT fk_diagnoses_directory_diagnoses FOREIGN KEY (id) REFERENCES public.directory_diagnoses(id) ON DELETE CASCADE;
ALTER TABLE public.diagnoses ADD CONSTRAINT fk_diagnosis_patient FOREIGN KEY (patient_id) REFERENCES public.directory_diagnoses(id) ON DELETE CASCADE;

-- public.measures definition

-- Drop table

-- DROP TABLE public.measures;

CREATE TABLE public.measures (
	id serial NOT NULL,
	sist int4 NOT NULL,
	diast int4 NOT NULL,
	pulse int4 NOT NULL,
	measure_date timestamp(0) NOT NULL,
	"action" varchar(255) NOT NULL,
	"comment" varchar(255) NOT NULL,
	patient_id int4 NOT NULL,
	CONSTRAINT measures_pkey PRIMARY KEY (id)
);


-- public.measures foreign keys

ALTER TABLE public.measures ADD CONSTRAINT fk_measure_patient FOREIGN KEY (patient_id) REFERENCES public.patients(id) ON DELETE CASCADE;


-- public.purposes definition

-- Drop table

-- DROP TABLE public.purposes;

CREATE TABLE public.purposes (
	id serial NOT NULL,
	patient_id int4 NOT NULL,
	doctor_id int4 NOT NULL,
	drug_id int4 NOT NULL,
	"time" time(0) NOT NULL,
	"period" int4 NOT NULL,
	signa varchar(255) NULL,
	CONSTRAINT purposes_pkey PRIMARY KEY (id)
);


-- public.purposes foreign keys

ALTER TABLE public.purposes ADD CONSTRAINT fk_purpose_drugs FOREIGN KEY (drug_id) REFERENCES public.directory_drugs(id) ON DELETE CASCADE;
ALTER TABLE public.purposes ADD CONSTRAINT fk_purposes_doctors FOREIGN KEY (doctor_id) REFERENCES public.doctors(id) ON DELETE CASCADE;
ALTER TABLE public.purposes ADD CONSTRAINT fk_purposes_patient FOREIGN KEY (patient_id) REFERENCES public.patients(id) ON DELETE CASCADE;


