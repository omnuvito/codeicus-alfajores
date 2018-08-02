import React from 'react';
import { Card, CardHeader, CardTitle, CardText } from 'material-ui/Card';

const AlfajorCard = ({ gusto, letra, valor, style }) => (
    <Card style={style}>
        <CardHeader title={letra} />
        <CardTitle title={gusto} subtitle={gusto} />
        <CardText>{valor}</CardText>
    </Card>
);

export default AlfajorCard;