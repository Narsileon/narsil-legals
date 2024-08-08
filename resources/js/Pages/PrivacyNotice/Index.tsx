import { Section, SectionContent, SectionHeader, SectionTitle } from "@narsil-ui/Components";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";
import parse from "html-react-parser";

interface Props {
	content: string;
}

const Index = ({ content }: Props) => {
	const { trans } = useTranslationsStore();

	return (
		<Section>
			<SectionHeader>
				<SectionTitle>{trans("Privacy Notice")}</SectionTitle>
			</SectionHeader>
			<SectionContent className='prose max-w-none'>{parse(content)}</SectionContent>
		</Section>
	);
};

export default Index;
