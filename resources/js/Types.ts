import { LanguageModel } from "@narsil-localization/Types";

export type ImprintModel = {
	active: boolean;
	content: string;
	created_at: string;
	id: number;
	language_id: number;
	language: LanguageModel;
	updated_at: string;
};

export type PrivacyNoticeModel = {
	active: boolean;
	content: string;
	created_at: string;
	id: number;
	language_id: number;
	language: LanguageModel;
	updated_at: string;
};
