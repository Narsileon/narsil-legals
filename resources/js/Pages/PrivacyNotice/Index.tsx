import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import parse from "html-react-parser";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import AppHead from "@narsil-ui/Components/App/AppHead";

interface Props {
	content: string;
}

const Index = ({ content }: Props) => {
	const { trans } = useTranslationsStore();

	return (
		<Fullscreen>
			<AppHead />
			<Section>
				<SectionHeader>
					<SectionTitle>{trans("Privacy notice")}</SectionTitle>
					<FullscreenToggle />
				</SectionHeader>
				<SectionContent className='prose max-w-none'>{parse(content)}</SectionContent>
			</Section>
		</Fullscreen>
	);
};

export default Index;
